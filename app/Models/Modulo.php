<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Modulo extends Model
{
    use HasFactory;

    protected $table =  "modulos";
    protected $primaryKey = "id";

    protected $fillable = ['nombre', 'ruta', 'modulo_padre_id', 'baja', 'es_padre' , 'icono'];


    public static function GenerarMenu($rolId){

        $modulos = DB::table('modulos as mod')->get();

        $data = DB::table('roles_permisos as rp')
            ->join('modulos as m', 'rp.modulo_id','m.id')             
            ->where('rp.rol_id', $rolId)
            ->where('m.baja', 0)
            ->where('rp.baja', 0)
            ->select('m.id as idHijo','m.nombre as moduloHijo', 'm.ruta as rutaHijo', 'm.modulo_padre_id as padreId' )
            ->get();

        $primerNivel = $data->map(function($item) use ($modulos) {
            $padre = $modulos->where('id', $item->padreId)->first();  
            if($padre->ruta=='#'){
                return $modulos->where('id', $item->idHijo)->first();
            }

            return $padre;
                
        })->unique('id');

        $padres = $primerNivel->map(function($item) use ($modulos){                 
            return $modulos->where('id', $item->modulo_padre_id)->first(); 
        })->unique('id');



        return array("hijos"=>$data, "primerNivel" => $primerNivel, "padres" => $padres);

           
    }

}
