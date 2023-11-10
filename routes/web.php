<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;

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

/* *** Acceso*** */
Route::get('admin/login', function(){
    return view('Admin.sistema.usuarios.login');
})->name('admin.login');

Route::post('admin/authin', [UsuariosController::class, 'authenticate'])->name('admin.auth');


Route::prefix('admin')->middleware('auth')->group(function () {

    /* *** sistema *** */
    Route::get('home', [UsuariosController::class, 'home'])->name('admin.home');

    Route::get('logauth', [UsuariosController::class, 'logauth'])->name('auth.logauth');


    /* *** Catálogos *** */

        /* *** roles *** */
        Route::prefix('roles')->group(function (){

            Route::get('/', [RolesController::class, 'index'] )->name('roles');
            Route::get('all', [RolesController::class, 'listar'])->name('roles.listar');
            Route::get('get',[RolesController::class, 'obtener'])->name('roles.obtener');
            Route::post('save', [RolesController::class, 'save'])->name('roles.save');
            Route::post('del', [RolesController::class, 'delete'])->name('roles.del');
    
        });

      
        /* *** modulos *** */


        /* *** permisos *** */


        /* *** productos estados *** */


        /* *** venta estados *** */


    /* *** clientes *** */
    Route::prefix('clientes')->group(function (){

        Route::get('index', [ClientesController::class, 'index'] )->name('clientes');


    });

    /* *** proveedores *** */


    /* *** productos *** */


});

    


/* ** Delivery*** */
