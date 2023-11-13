<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Models\Permiso;
use App\Models\Modulo;
use App\Models\Rol;

class PermisosController extends Controller
{
    public function index(){
        $user = Auth::user();
        $rol = Rol::where('id', $user->rol_id)->first();
        $menu = Modulo::GenerarMenu($rol->id);
        return view('Admin.sistema.modulos.permisos', compact('user', 'rol', 'menu'));
    }

    public function save(Request $r){
        try{

            if($r->rolId==null){
                return response()->json(["status" => 422, 'errors'=>["rol"=>["No se ha seleccionado ningún Rol"]]]);
            }else if($r->moduloId == null){
                return response()->json(["status" => 422, 'errors'=>["modulo"=>["No se ha seleccionado ningún Módulo"]]]);
            }            

            $data = array(
                'rol_id' => $r->rolId,
                'modulo_id' => $r->moduloId,
                'baja' => 0, //default 0              
            );          

            if($r->id==null){
               Permiso::create($data);
            }else{
                Permiso::where('id', $r->id)->update($data);
            }

            return response()->json(["status"=>200, "msj"=>"success"]);

        }catch(Exception $ex){
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());
            return response()->json(["status"=>500, "msj" => "error en save"]);
        }
    }

    public function listar(){
        return Permiso::all();
    }

    public function obtener(Request $r){
        return Permiso::where('id', $r->id)->first();
    }

    public function delete(Request $r){
        try{
            Permiso::where('id', $r->id)->update(['baja'=>$r->baja]);
            return response()->json(["status"=>200, "msj"=>"success"]);
        }catch (QueryException $ex) {
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());       
            return response()->json(["status"=>500, "msj" => "error en delete"]);
        }
    }

    public function ListarPermisosRol(Request $r){
        return DB::table('roles_permisos as rp')
                ->join('roles as r', 'rp.rol_id', 'r.id')
                ->join('modulos as m', 'rp.modulo_id', 'm.id')
                ->select('rp.id as id', 'r.id as rolId', 'm.id as moduloId',
                 'r.nombre as nombreRol', 'm.nombre as nombreModulo', 'rp.created_at as fechaAsignacion', 'm.ruta', 'rp.baja')
                 ->where('rol_id', $r->id)
                 ->wherenotnull('ruta')
                 ->where('ruta','<>', '#')
                ->get();

    }

}
