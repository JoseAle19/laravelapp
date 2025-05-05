<?php

namespace App\Http\Controllers\Seguridad;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;  



class UsuarioController extends Controller
{


    public function catalogo()
    {

        $usuarioModel = new Usuario;
        $usuarios      = $usuarioModel->obtenerTodos();
        return view("modulos.seguridad.usuario.catalogo", compact('usuarios'));
    }


     /**
     * Muestra la vista de detalle para un solo usuario.
     *
     * @param  int  $idUsuario
     */
    public function detalle(int $idUsuario)
    {
        // findOrFail lanza 404 si no existe
        $usuario = Usuario::findOrFail($idUsuario);
        return view('modulos.seguridad.usuario.detalle', compact('usuario'));
    }

    public function formImagen(int $idUsuario)
    {
        $usuario = Usuario::findOrFail($idUsuario);
        return view('modulos.seguridad.usuario.formImagen', compact('usuario'));
    }



    public function subirImagen(Request $req, int $idUsuario)
    {
         $req->validate([
            'imagen' => 'required|image|max:2048',
        ]);
    
         $file = $req->file('imagen');
        $extension = $file->getClientOriginalExtension();
        $filename = "usuario_{$idUsuario}.{$extension}";
    
         $destinationPath = public_path('images/usuarios');
    
         if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
    
         $file->move($destinationPath, $filename);
    
         return redirect()
            ->route('usuarios.detalle', $idUsuario)
            ->with('success', 'La imagen se ha subido correctamente.');
    }
    
}
