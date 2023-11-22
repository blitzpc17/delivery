<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Cliente extends Model
{
    use HasFactory;

    protected $table =  "clientes";
    protected $primaryKey = "id";

    protected $fillable = ['telefono', 'avatar', 'baja', 'personas_id', 'carrito_compras'];


    public static function ObtenerDataCliente($userId){
        return  DB::table('usuarios as us')
                ->join('roles as rol', 'us.rol_id', 'rol.id')
                ->join('personas as per', 'us.personas_id', 'per.id')
                ->join('clientes as cli', 'per.id', 'cli.personas_id')
                ->where('us.id', $userId)
                ->select('us.id as UsuarioId', 'us.name as NombreUsuario', 'us.email as Correo',
                    'rol.id as RolesId', 'rol.nombre as NombreRol', 'cli.telefono as Telefono', 'cli.avatar as Avatar', 'cli.carrito_compras',
                    'cli.baja as Estado', DB::raw("per.nombres+' '+per.apellidos as NombreCliente")
                )
                ->first();
    }


}
