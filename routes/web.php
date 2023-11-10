<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RolesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/* *** ADMIN *** */
Route::prefix('admin')->group(function () {

    /* *** sistema *** */
    Route::get('home', function(){
        return view('Admin.sistema.home');
    })->name('admin.home');


    /* *** Catálogos *** */

        /* *** roles *** */
        Route::prefix('roles')->group(function (){

            Route::get('index', [RolesController::class, 'index'] )->name('roles');
            Route::get('all', [RolesController::class, 'listar'])->name('roles.listar');
            Route::get('get',[RolesController::class, 'obtener'])->name('roles.obtener');
            Route::post('save', [RolesController::class, 'save'])->name('roles.save');
            Route::post('del', [RolesController::class, 'delete'])->name('roles.del');
    
        });


        /* *** puestos *** */


        /* *** modulos *** */


        /* *** permisos *** */


        /* *** productos estados *** */


        /* *** venta estados *** */


    /* *** clientes *** */
    Route::prefix('clientes')->group(function (){

        Route::get('index', [ClientesController::class, 'index'] )->name('clientes');


    });

    /* *** proveedores *** */


});

    


/* ** Delivery*** */
