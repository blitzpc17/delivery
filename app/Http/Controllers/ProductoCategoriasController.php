<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

use App\Models\Modulo;
use App\Models\Rol;
use App\Models\ProductoCategoria;

class ProductoCategoriasController extends Controller
{
    public function index(){
        $user = Auth::user();
        $rol = Rol::where('id', $user->rol_id)->first();
        $menu = Modulo::GenerarMenu($rol->id);
        return view('Admin.sistema.catalogos.categorias_productos', compact('user', 'rol', 'menu'));
    }

    public function save(Request $r){
        try{
            $validador = Validator::make($r->all(), [
                'nombre' => 'required|string|max:255'
            ]);

            if($validador->fails()){
                return response()->json(["status" => 422, 'errors'=>$validador->errors()]);
            }                

            $imagen = $r->file('image');
            $nombreArchivo = null;
            if($imagen!=null){
                $ruta = "Delivery/assets/images/categorias/";
                if(!Storage::exists($ruta)){
                    Storage::makeDirectory($ruta, 0755, true);
                }
                $nombreArchivo = rand() . '.' . $imagen->getClientOriginalExtension();    
                $imagen->move(public_path($ruta), $nombreArchivo);
            }else{
                $imagen = null;
                $nombreArchivo = "default.png";
            }  

            $data = array(
                'nombre' => $r->nombre,
                'imagen' => $nombreArchivo
            );  

            if($r->id==null){
               ProductoCategoria::create($data);
            }else{
                ProductoCategoria::where('id', $r->id)->update($data);
            }

            return response()->json(["status"=>200, "msj"=>"success"]);

        }catch(Exception $ex){
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());
            return response()->json(["status"=>500, "msj" => "error en save"]);
        }
    }

    public function listar(){
        return ProductoCategoria::all();
    }

    public function obtener(Request $r){
        return ProductoCategoria::where('id', $r->id)->first();
    }

    public function delete(Request $r){
        try{
            ProductoCategoria::where('id', $r->id)->update(["baja" => $r->baja]);
            return response()->json(["status"=>200, "msj"=>"success"]);
        }catch (QueryException $ex) {
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());       
            return response()->json(["status"=>500, "msj" => "error en delete"]);
        }
    }


    public function ListarCategoriasProductoSelect(Request $r){
        return DB::table('venta_estados')
                ->select('id', 'nombre as text')
                ->get();

    }

    public function listarCategoriasActivas(){
        return ProductoCategoria::where('baja', 0)->orWhereNull('baja')->get();
    }


}
