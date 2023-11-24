<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


use App\Models\User;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\VentaPartida;


class PedidosController extends Controller
{
    public function checkout(Request $r){
        $user = Auth::user();
        $dataCli = Cliente::ObtenerDataCliente($user->id);  

        return view('Delivery.Pages.checkout', compact('user', 'dataCli'));
    }

    public function comprasCliente(Request $r){
        //compras realizadas
        $user = Auth::user();
        $dataCli = Cliente::ObtenerDataCliente($user->id); 
        
        return view('Delivery.Pages.compras', compact('user', 'dataCli'));
    }

    public function pedidosClienteListar(Request $r){
        $data = DB::table('ventas as v')
                    ->join('clientes as cli', 'v.cliente_id', 'cli.id')
                    ->join('proveedores as prov', 'v.proveedor_id', 'prov.id')
                    ->join('venta_estados as ve', 'v.estado_id', 've.id')
                    ->where('cliente_id', $r->clienteId)
                    ->select('v.id as ventaId',
                    'v.folio as Folio', 
                    'v.fecha_emision as FechaEmision', 
                    'v.fecha_cancelacion as FechaCancelacion', 
                    'v.fecha_entrega as FechaEntrega',
                    'v.punto_entrega as PuntoEntrega',
                    'v.updated_at as UltimaActualizacion',
                    'prov.razon_social as RazonSocial',
                    've.nombre as Estado',
                    DB::raw('(select sum(vp.precio_venta*vp.cantidad) from ventas_partidas vp where vp.venta_id = v.id group by vp.venta_id) as TotalPedido')
                    )
                    ->orderByDesc('v.id')
                    ->get();

        return $data;

    }

    public function pedidodosPartidasClientesListar(Request $r){

    }


    public function save(Request $r){
        $clienteId = $r->clienteId;
        $carrito = Cliente::ObtenerCarritoCliente($clienteId, true);
        if($carrito==null){
            return response()->json(["status"=>117, "msj" => "Tú carrito de compras esta vacío, visita nuestros productos."]);
        }
        $ventas = [];
        $partidas = [];
        $folios = [];
        $serie = "ITF";
        $longitud = "13";
        $fechaOperacion = date('Y-m-d H:i:s');

       foreach($carrito as $prov){
            $pedido = [
                        "folio"=>null, 
                        "fecha_emision" => $fechaOperacion,
                        "cliente_id" => $clienteId,
                        "proveedor_id" => $prov[0]["proveedorId"],
                        "estado_id" => 1,
                        "punto_entrega" => $r->puntoEntrega,                        
                    ];
            $ultimo = Venta::count()>0?Venta::orderbydesc('id')->first()->id:0;
            $folio = $serie.str_pad($ultimo+1, 10, "0", STR_PAD_LEFT);
            $pedido["folio"] = $folio;

            $pedido = Venta::create($pedido);

            foreach($prov as $art){
                $partida = array(
                    "venta_id" => $pedido->id,
                    "proveedor_id" => $pedido->proveedor_id,
                    "producto_id" => $art["productoId"],
                    "precio_venta" => $art["precio"],
                    "cantidad" => $art["cantidad"],
                    "baja" => 0
                ); 

                VentaPartida::create($partida);

            }

            $folios[] = $folio;

            Cliente::where('id', $clienteId)->update(["carrito_compras"=>"[]"]);
       }

       return response()->json(["status"=>200, "msj"=>"ok", "folios"=> $folios]);

        
    }




}
