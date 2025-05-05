<?php

namespace App\Http\Controllers\Seguridad;

use DateTime;
use DateInterval;
use Illuminate\Http\Request;
use App\Models\Seguridad\Usuario;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Seguridad\PasswordResetToken;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\ResetCodeMail;;

class LoginController extends Controller
{

    public $modelUsuario;
    public function __construct()
    {
        $this->modelUsuario = new Usuario();
    }

    public function login($url = null): View
    {
        return view('modulos.seguridad.auth.login', ['url' => $url, 'mensajes' => array()]);
    }


    public function acceso(Request $request)
    {

        if ($request->isMethod('post')) {
            if ($request->ajax()) {

                $validator = Validator::make(
                    $request->all(),
                    [
                        'usuarioAlias' => 'required',
                        'usuarioPassword' => 'required'
                    ],
                    [
                        'usuarioAlias.required' => 'El campo usuario es requerido.',
                        'usuarioPassword.required' => 'El campo contraseña es requerido.'
                    ]
                );
                if ($validator->fails()) {
                    $message  = $validator->errors()->toArray();
                    return response()->json(['success' => false, 'message' => $message, 'required' => true]);
                }

                $usuarioAlias    = $request->usuarioAlias;
                $usuarioPassword = $request->usuarioPassword;
                $url             = "/seguridad/usuario/catalogo";

                $bandera = true;
                $mensajes = [];
                $modeloUsuario = $this->modelUsuario;
                $usuario       = $modeloUsuario->obtenerUsuario($usuarioAlias);

                if ($usuario) {
                    //Bloqueo
                    if ($usuario->usuarioEstado == "Bloqueado") {
                        $bandera = false;
                        $mensajes = "Usuario Bloqueado, Favor de Verificar";
                    } else if ($usuario->usuarioEstado == "Inactivo" || $usuario->usuarioEstado == "Desactivado") {
                        $bandera = false;
                        $mensajes = "Usuario Inválido " . $usuarioAlias . ", Favor de Verificar";
                    } else {
                        //Password
                        if (md5($usuarioPassword) != $usuario->usuarioPassword) {
                            $bandera = false;
                            $mensajes = "Credenciales Invalidas, Favor de Verificar($usuario->usuarioIntentos)";
                        }
                    }
                } else {

                    $bandera = false;
                    $mensajes = "Correo electrónico o contraseña incorrectos";
                }

                if ($bandera) {
                    $modeloUsuario->guardarSesion($usuario->idUsuario);
                  
                    return response()->json(['success' => true, 'message' => 'Excelente logueo con éxito.', 'url' => $url]);
                } else {
                    return response()->json(['success' => false, 'required' => true, 'message' => ['usuarioAlias' => [$mensajes]]]);
                }
            }
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }



    public function showForgotForm()
    {
        return view('modulos.seguridad.auth.forgot-password');
    }

    
    public function sendResetCode(Request $req)
    {
        $req->validate([
            'usuarioEmail' => 'required|email'
        ]);

        $usuario = Usuario::where('usuarioEmail', $req->usuarioEmail)->first();
        if (! $usuario) {
            return back()->withErrors([
                'usuarioEmail' => 'El correo ingresado no se encuentra en la base de datos'
            ]);
        }

         $code = rand(100000, 999999);

         PasswordResetToken::updateOrCreate(
            ['email' => $usuario->usuarioEmail],
            [
                'token'      => $code,
                'created_at' => Carbon::now(),
            ]
        );

         Mail::to($usuario->usuarioEmail)
            ->send(new ResetCodeMail($code));

         return redirect()
            ->route('password.verify.form')
            ->with('email', $usuario->usuarioEmail);
    }
 
    public function showVerifyForm()
    {
        return view('modulos.seguridad.auth.verify-code')
               ->with('email', session('email'));
    }

 
    public function verifyCode(Request $req)
    {
        $req->validate([
            'usuarioEmail' => 'required|email',
            'reset_code'   => 'required|digits:6',
        ]);

        $record = PasswordResetToken::find($req->usuarioEmail);

        if (
            ! $record ||
            $record->token !== $req->reset_code ||
            Carbon::parse($record->created_at)->addMinutes(30)->isPast()
        ) {
            return back()->withErrors([
                'reset_code' => 'El Código ingresado es incorrecto o expiró'
            ]);
        }

         return redirect()
            ->route('password.reset.form')
            ->with('email', $req->usuarioEmail);
    }

     
    public function showResetForm()
    {
        return view('modulos.seguridad.auth.reset-password')
               ->with('email', session('email'));
    }

 
    public function resetPassword(Request $req)
    {
        $req->validate([
            'usuarioEmail' => 'required|email',
            'password'     => 'required|string|min:8|confirmed',
        ]);

        $usuario = Usuario::where('usuarioEmail', $req->usuarioEmail)
                          ->firstOrFail();

         $usuario->usuarioPassword = md5($req->password);
        $usuario->save();

         PasswordResetToken::where('email', $req->usuarioEmail)->delete();

        return redirect()
            ->route('login')
            ->with('success', 'Contraseña Restablecida');
    }
}
