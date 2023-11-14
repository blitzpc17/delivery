<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ModulosController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\EstadoVentaController;
use App\Http\Controllers\EstadoProductosController;

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
            Route::get('select', [RolesController::class, 'ListarRolesSelect'])->name('roles.select.listar');
    
        });

        /* *** estados ventas *** */
        Route::prefix('edovta')->group(function (){

            Route::get('/', [EstadoVentaController::class, 'index'] )->name('edovta');
            Route::get('all', [EstadoVentaController::class, 'listar'])->name('edovta.listar');
            Route::get('get',[EstadoVentaController::class, 'obtener'])->name('edovta.obtener');
            Route::post('save', [EstadoVentaController::class, 'save'])->name('edovta.save');
            Route::post('del', [EstadoVentaController::class, 'delete'])->name('edovta.del');
            Route::get('select', [EstadoVentaController::class, 'ListarRolesSelect'])->name('edovta.select.listar');    
        });

        /* *** estados productos *** */
        Route::prefix('edopro')->group(function (){

            Route::get('/', [EstadoProductosController::class, 'index'] )->name('edopro');
            Route::get('all', [EstadoProductosController::class, 'listar'])->name('edopro.listar');
            Route::get('get',[EstadoProductosController::class, 'obtener'])->name('edopro.obtener');
            Route::post('save', [EstadoProductosController::class, 'save'])->name('edopro.save');
            Route::post('del', [EstadoProductosController::class, 'delete'])->name('edopro.del');
            Route::get('select', [EstadoProductosController::class, 'ListarEstadosProductoSelect'])->name('edopro.select.listar');    
        });

      
        /* *** modulos *** */
        Route::prefix('modulos')->group(function (){

            Route::get('/', [ModulosController::class, 'index'] )->name('modulos');
            Route::get('all', [ModulosController::class, 'listar'])->name('modulos.listar');
            Route::get('get',[ModulosController::class, 'obtener'])->name('modulos.obtener');
            Route::post('save', [ModulosController::class, 'save'])->name('modulos.save');
            Route::post('del', [ModulosController::class, 'delete'])->name('modulos.del');
            Route::get('select', [ModulosController::class, 'ListarModulosSelect'])->name('modulos.select.listar');
        });


        /* *** permisos *** */

        Route::prefix('permisos')->group(function (){

            Route::get('/', [PermisosController::class, 'index'] )->name('permisos');
            Route::get('all', [PermisosController::class, 'listar'])->name('permisos.listar');
            Route::get('get',[PermisosController::class, 'obtener'])->name('permisos.obtener');
            Route::post('save', [PermisosController::class, 'save'])->name('permisos.save');
            Route::post('del', [PermisosController::class, 'delete'])->name('permisos.del');
            Route::get('listar/rol', [PermisosController::class, 'ListarPermisosRol'])->name('permisos.listar.rol');
        });
        /* *** productos estados *** */


        /* *** venta estados *** */


    /* *** clientes *** */
    Route::prefix('clientes')->group(function (){

        Route::get('index', [ClientesController::class, 'index'] )->name('clientes');


    });

    /* *** proveedores *** */


    /* *** productos *** */


    /* *** ventas *** */


});

    


/* ** Delivery*** */
