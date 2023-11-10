<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Rol;
use App\Models\User;

class UsuariosController extends Controller
{
    public function singup(Request $r){
        try{

            if($r->tipo==null){
                return response()->json(["status"=>"422", "errors"=>["campo Tipo es obligatorio"]]);
            }
            $reglas = [
                'nombres' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'fechaNacimiento' => 'required|date',
                'sexo' => 'required|string|size:1',
            ];
            
            $data = [];          

            switch($r->tipo){
                case "P":
                    $reglas_complemento = [
                        'razonSocial' => 'required|string|max:255',
                        'representanteId' => 'required|integer'
                    ];
                    $reglas = array_merge($reglas, $reglas_complemento);

                    $data = [
                        "razon_social" => $r->razonSocial,
                        "slogan" => $r->slogan,
                        "logo" => $r->logo??"default.jpg",
                        "direccion" => $r->direccion,
                        "telefono" => $r->telefono,
                        "horario" => $r->horario,
                        "baja" => $r->baja,                        
                    ];
                    break;
                case "U":
                    $reglas_complemento = [];
                    $reglas = array_merge($reglas, $reglas_complemento);
                    $data = [
                        "telefono" => $r->telefono,
                        "avatar" => $r->avatar??"default.jpg",
                        "baja" => $r->baja,
                        "carrito_compras" => '[]'
                    ];
                    break;
                default:
                    return response()->json(["status"=>"422", "errors"=>["valor del campo Tipo no válido"]]);
                    break;
            }


            $validador = Validator::make($r->all(), $reglas);

            if($validador->fails()){
                return response()->json(["status" => 422, 'errors'=>$validador->errors()]);
            }

            $dataPersona = array(
                "nombres" => $r->nombres,
                "apellidos" => $r->apellidos,
                "fecha_nacimiento" => $r->fechaNacimiento,
                "sexo" => $r->sexo                
            );
            $result = Persona::create($dataPersona);

            $personaId = $result->id;

            $dataUser = array(
                "name" => $r->name,
                "email" => $r->email,
                "password" => bcrypt($r->password),
                "personas_id" => $result->id,
                "rol_id" => $r->rolId
            );

            $result = User::create($dataUser);

            if($r->tipo == 'P'){
                $data = array_merge($data, ["representante_id" => $personaId]);
                $result = Proveedor::create($data);
            }else{
                $data = array_merge($data, ["personas_id"=>$personasId]);
                $result = Cliente::create($data);
            }

            return response()->json(["status" => 200, "msj"=> "ok"]);


        }catch(Exception $ex){
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());
            return response()->json(["status"=>500, "msj" => "error en save"]);
        }
    }

    public function index(){
        return view('Admin.sistema.usuarios.usuarios_sistema');
    }

    public function save(Request $r){

    }  


    public function authenticate(){

    }



}
