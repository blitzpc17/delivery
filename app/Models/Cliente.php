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
        $data =  DB::table('usuarios as us')
                ->join('roles as rol', 'us.rol_id', 'rol.id')
                ->join('personas as per', 'us.personas_id', 'per.id')
                ->join('clientes as cli', 'per.id', 'cli.personas_id')
                ->where('us.id', $userId)
                ->select('us.id as UsuarioId', 'us.name as NombreUsuario', 'us.email as Correo',
                    'rol.id as RolesId', 'rol.nombre as NombreRol', 'cli.id as ClienteId', 'cli.telefono as Telefono', 'cli.avatar as Avatar', 'cli.carrito_compras as carrito',
                    'cli.baja as Estado', DB::raw("per.nombres,' ',per.apellidos as NombreCliente")
                )
                ->first();

        $carrito = collect(json_decode($data->carrito));

        $data->CarritoItems = $carrito->count();

        return $data;

    }

    public static function ObtenerCarritoCliente($clienteId, $agrupado=false){
        $cliente = DB::table('clientes')->where('id', $clienteId)->first();
        $carrito = collect(json_decode($cliente->carrito_compras));

        if($carrito->isEmpty()) return null;

        $productosIds = $carrito->pluck('productoId')->toarray();
        $productos = DB::table('productos as pro')
                        ->join('proveedores as prov', 'pro.proveedor_id', 'prov.id')
                        ->wherein('pro.id', $productosIds)
                        ->select('pro.id as productoId','pro.nombre','prov.razon_social as proveedor', 'prov.id as proveedorId', 'pro.imagen', 'pro.precio')
                        ->get();

        $carritoView = $carrito->map(function($item) use($productos){
            $pro = $productos->where('productoId', $item->productoId)->first();
            return collect(["productoId" => $item->productoId, "nombre" => $pro->nombre, "cantidad" => $item->cantidad, "proveedor" => $pro->proveedor, "proveedorId" => $pro->proveedorId , "imagen" => $pro->imagen, "precio"=> $pro->precio]);
        });

        if($agrupado==false){
            return $carritoView;
        }else{
            return $carritoView->groupBy('proveedor');
        }
        
    }


}
