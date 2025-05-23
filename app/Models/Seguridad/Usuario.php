<?php

namespace App\Models\Seguridad;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;
class Usuario extends Model
{

    protected $table = 'seg_usuario';
    protected $primaryKey = "idUsuario";
    public $timestamps = false;
 

    public function conectar($id, $token)
    {
        $row = Usuario::find($id);
        if ($row) {
             $row->usuarioUltimaConexion = Carbon::now();
            $row->save();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function desconectar($id)
    {
        $row = Usuario::find($id);
        if ($row) {
            $row->save();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function obtenerUsuario($usuarioAlias)
    {
        $usuario = $this->whereRaw("usuarioAlias = BINARY '" . $usuarioAlias . "'")->get()->first();
        return $usuario;
    }

    function guardarSesion($idUsuario)
    {
        $usuario = $this->find($idUsuario);
        $usuario->usuarioUltimaConexion = date('Y-m-d H:i:s');
        $usuario->save();
        return true;
 }
 public  function obtenerTodos()
 {
 return $this->orderBy('usuarioAlias')->get();

 }

}
