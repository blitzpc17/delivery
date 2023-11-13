<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use \stdClass;
use Session;

use App\Models\Persona;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Rol;
use App\Models\User;
use App\Models\Modulo;

class UsuariosController extends Controller
{
    //Api
    public function singup(Request $r){
        try{

            if($r->tipo==null){
                return response()->json(["status"=>"422", "errors"=>["campo Tipo es obligatorio"]]);
            }
            $reglas = [
                //persona
                'nombres' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'fechaNacimiento' => 'required|date',
                'sexo' => 'required|string|size:1',
                //user
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|string|max:255|min:8',
                'rolId' => 'required'
            ];
            
            $data = [];          

            switch($r->tipo){
                case "P":
                    $reglas_complemento = [
                        'razonSocial' => 'required|string|max:255',                       
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
            $user = $result;
            $token = $user->createToken('auth_token')->plainTextToken;

            if($r->tipo == 'P'){
                $data = array_merge($data, ["representante_id" => $personaId]);
                $result = Proveedor::create($data);
            }else{
                $data = array_merge($data, ["personas_id"=>$personasId]);
                $result = Cliente::create($data);
            }

            return response()->json(["status" => 200, "msj"=> "ok", "data" => ["user"=>$user, "acces_token"=>$token, "token_type"=>"Bearer"]]);


        }catch(Exception $ex){
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());
            return response()->json(["status"=>500, "msj" => "error en save"]);
        }
    }  
    

    public function authenticatApi(){

        $reglas = [             
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255|min:8'               
        ];

        $validador = Validator::make($r->all(), $reglas);

        if($validador->fails()){
            return response()->json(["status" => 422, 'errors'=>$validador->errors()]); //cambiar este por un return back
        }

        if(Auth::attempt(['email' => $r->email, 'password' => $r->password])){

              $user  = User::where('email', $r->email)->first();
              $token = $user->createToken('auth_token')->plainTextToken;
              
              return response()->json(['status'=>200, 'msj'=>'willkommen', 'data'=>['user'=>$user, 'accesToken'=>$token, 'token_type'=>'Bearer']]);
        }


        return response()->json(["status" => 401, 'msj'=>"Unauthorized" ]); 
    }

    public function modificarPerfilApi(){
        
    }
   

    //sistema
    public function authenticate(Request $r){

        try{
            $reglas = [             
                'email' => 'required|email|max:255',
                'password' => 'required|string|max:255|min:8'               
            ];

            $validador = Validator::make($r->all(), $reglas);

            if($validador->fails()){
                return back()->withErrors($validador)->withInput();
            }

            if(Auth::attempt(['email' => $r->email, 'password' => $r->password])){

                $r->session()->regenerate(); 
              
                return redirect()->intended('admin/home');
               
            }           

            return back()->withErrors([
                'unauthorizate' => 'Los datos ingresados no coinciden con nuestros registros.',
            ])->onlyInput('email');


        }catch(Exception $ex){
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());
            return response()->json(["status"=>500, "msj" => "error en save"]);
        }

    }

    public function logauth(Request $r){        
        Auth::logout();
        Session::flush();
        return redirect()->route('admin.login');
    }

    public function save(Request $r){
        try{
            $reglas = [
                //persona
                'nombres' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'fechaNacimiento' => 'required|date',
                'sexo' => 'required|string|size:1',
                //user
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|string|max:255|min:8',
                'rolId' => 'required'
            ];

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

            $dataUser = array(
                "name" => $r->name,
                "email" => $r->email,
                "password" => bcrypt($r->password),
               // "personas_id" => $result->id,
                "rol_id" => $r->rolId
            );

            if($r->id==null){
                
                $result = Persona::create($dataPersona);    
                $personaId = $result->id;  
                $dataUser = array_merge($dataUser, ["personas_id"=> $personaId]);
                User::create($dataUser);

            }else{
                
                User::where(id, $r->id)->update($dataUser);
                Persona::where(id, $r->personaId)->update($dataPersona);
            }         

            return response()->json(["status" => 200, "msj"=> "ok"]);

        }catch(Exception $ex){
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());
            return response()->json(["status"=>500, "msj" => "error en save"]);
        }
    } 
    
    public function home(Request $r){
        $user = Auth::user();
        $rol = Rol::where('id', $user->rol_id)->first();
        $menu = Modulo::GenerarMenu($rol->id);
        return view('Admin.sistema.home', compact('user', 'rol', 'menu'));
    }


    public function gestionUsuariosSistema(){
        return view('Admin.sistema.usuarios.usuarios_sistema');
    }

    public function gestionUsuariosApp(){
        return view('Admin.sistema.usuarios.usuarios_app');
    }



}
