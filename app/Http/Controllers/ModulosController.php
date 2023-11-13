<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Models\Modulo;
use App\Models\Rol;

class ModulosController extends Controller
{

    public function index(){
        $user = Auth::user();
        $rol = Rol::where('id', $user->rol_id)->first();
        $menu = Modulo::GenerarMenu($rol->id);
        return view('Admin.sistema.modulos.captura_consulta', compact('user', 'rol', 'menu'));
    }

    // '#' es padre
    //'' es submenu
    // '/' es modulo
    public function save(Request $r){
        try{
            $validador = Validator::make($r->all(), [
                'nombre' => 'required|string|max:255',
            ]);

            if($validador->fails()){
                return response()->json(["status" => 422, 'errors'=>$validador->errors()]);
            }

            if($r->ruta == "#" && empty($r->icono)){
                return response()->json(["status" => 422, 'errors'=>["icono" =>["Es obligatorio agregar icono si el módulo es Padre"]]]);
            }

            $data = array(
                'nombre' => $r->nombre,
                'ruta' => $r->ruta,
                'modulo_padre_id' => $r->moduloId,
                'baja' => 0, //default 0
                'es_padre' => ($r->ruta=="#")?1:0, //solo si tiene #,
                'icono' => $r->icono
            );          

            if($r->id==null){
               Modulo::create($data);
            }else{
                Modulo::where('id', $r->id)->update($data);
            }

            return response()->json(["status"=>200, "msj"=>"success"]);

        }catch(Exception $ex){
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());
            return response()->json(["status"=>500, "msj" => "error en save"]);
        }
    }

    public function listar(){
        return Modulo::all();
    }

    public function obtener(Request $r){
        return Modulo::where('id', $r->id)->first();
    }

    public function delete(Request $r){
        try{
            Modulo::where('id', $r->id)->update(['baja'=>$r->baja]);
            return response()->json(["status"=>200, "msj"=>"success"]);
        }catch (QueryException $ex) {
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());       
            return response()->json(["status"=>500, "msj" => "error en delete"]);
        }
    }

    public function ListarModulosSelect(Request $r){
        return DB::table('modulos')
                ->select('id', 'nombre as text')
                ->get();

    }


}
