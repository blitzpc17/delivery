<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


use App\Models\User;
use App\Models\Cliente;
use App\Models\ProductoCategoria;
use App\Models\Producto;


class ClientesController extends Controller
{
    public function login(){

        return view('Delivery.Pages.login');

    }

    public function register(){
        return view('Delivery.Pages.register');
    }

    public function index(){
        $user = Auth::user();
        $dataCli = Cliente::ObtenerDataCliente($user->id);  
        return view('Delivery.Pages.home', compact('user', 'dataCli'));
    }

    public function cart(){
        $user = Auth::user();
        $dataCli = Cliente::ObtenerDataCliente($user->id);  
        return view('Delivery.Pages.cart', compact('user', 'dataCli'));
    }

    public function actualizarCarrito(Request $r){
        $cliente = Cliente::where('id', $r->clienteId)->first();
        $carrito = collect(json_decode($cliente->carrito_compras));
        $productoSeleccionadoId = $r->productoId;
        $cantidad = $r->cantidad;

        $existe = $carrito->contains(function($item)use($productoSeleccionadoId){
            return $item->productoId == $productoSeleccionadoId;
        });

        if($existe){            
            $carrito = $carrito->map(function($item) use ($productoSeleccionadoId, $cantidad ){
                if($item->productoId== $productoSeleccionadoId){
                    $item->cantidad = $item->cantidad + $cantidad;
                }
                return $item;
            }); 
        }else{
            $carrito = $carrito->push(["productoId" => $productoSeleccionadoId, "cantidad" => $cantidad]);
        }

        $nopro = $carrito->count();

        Cliente::where('id', $r->clienteId)->update(["carrito_compras" => $carrito]);

        return response()->json(["status"=>200, "msj" => "ok", "productos" => $nopro]);
        
    }

    public function removeProductoCarrito(Request $r){
        $cliente = Cliente::where('id', $r->clienteId)->first();
        $carrito = collect(json_decode($cliente->carrito_compras));
        $productoSeleccionadoId = $r->productoId;

        $carrito = $carrito->reject(function($item) use ($productoSeleccionadoId){
            return $productoSeleccionadoId == $item->productoId;
        });

        Cliente::where('id', $r->clienteId)->update(["carrito_compras" => $carrito]);

        $nopro = $carrito->count();

        return response()->json(["status"=>200, "msj" => "ok", "productos" => $nopro]);
    }


    public function listarCarrito(Request $r){
        $cliente = Cliente::where('id', $r->clienteId)->first();
        $carrito = $carrito = Cliente::ObtenerCarritoCliente($r->clienteId);        
        return $carrito;
    }

    public function agruparCarritoClienteProveedor(Request $r){       
        $carrito = Cliente::ObtenerCarritoCliente($r->clienteId, true);        
        return $carrito;

    }

    public function compras(){
        $user = Auth::user();
        $dataCli = Cliente::ObtenerDataCliente($user->id);  
        return view('Delivery.Pages.compras', compact('user', 'dataCli'));
    }


    public function save(Request $r){

    }

    public function listar(){

    }

    public function obtenerId(Request $r){

    }




}
