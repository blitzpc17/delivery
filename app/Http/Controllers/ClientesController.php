<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


use App\Models\User;
use App\Models\Cliente;
use App\Models\ProductoCategoria;


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


    public function save(Request $r){

    }

    public function listar(){

    }

    public function obtenerId(Request $r){

    }




}
