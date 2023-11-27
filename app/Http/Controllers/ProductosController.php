<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

use App\Models\Modulo;
use App\Models\Rol;
use App\Models\Proveedor;
use App\Models\ProductoCategoria;
use App\Models\ProductoEstado;
use App\Models\Producto;
use App\Models\Cliente;

class ProductosController extends Controller
{
    public function index(){
        $user = Auth::user();
        $proveedor = Proveedor::where('representante_id', $user->personas_id)->first();
        if($proveedor==null){
            return redirect()->route('admin.home');
        }
        $rol = Rol::where('id', $user->rol_id)->first();
        $menu = Modulo::GenerarMenu($rol->id);
        $categorias = ProductoCategoria::all();
        $estados = ProductoEstado::all();

        return view('Admin.productos.captura_consulta', compact('user', 'rol', 'menu', 'categorias', 'estados', 'proveedor'));
    }

    // '#' es padre
    //'' es submenu
    // '/' es modulo
    public function save(Request $r){
        try{
            $validador = Validator::make($r->all(), [
                'clave' => 'required|string|max:255',
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string|min:10',
                'precio' => 'required|numeric',
                'stock' => 'required|integer',
            ]);

            if($validador->fails()){
                return response()->json(["status" => 422, 'errors'=>$validador->errors()]);
            }

            if($r->categoriaId==null|| $r->categoriaId == -1 ){
                return response()->json(["status" => 422, 'errors'=>["categoriaId" =>["Es obligatorio asignar una categoría al producto."]]]);
            }

            if($r->estadoId==null|| $r->estadoId == -1 ){
                return response()->json(["status" => 422, 'errors'=>["estadoId" =>["Es obligatorio asignar una estado al producto."]]]);
            }

            $user = Auth::user();
            $proveedor = Proveedor::where('representante_id', $user->personas_id)->first();

            $data = array(
                'clave' => $r->clave,
                'nombre' => $r->nombre,
                'descripcion' => $r->descripcion,
                'precio' => $r->precio, 
                'producto_categorias_id' => $r->categoriaId,
                'stock' => $r->stock,
                'proveedor_id' => $proveedor->id,
                'estado_id' => $r->estadoId
            );       

            $imagen = $r->file('image');
            $nombreArchivo = null;

            if($imagen!=null){
                $ruta = "Admin/assets/images/productos/{$proveedor->id}";
                if(!Storage::exists($ruta)){
                    Storage::makeDirectory($ruta, 0755, true);
                }
                $nombreArchivo = rand() . '.' . $imagen->getClientOriginalExtension();    
                $imagen->move(public_path($ruta), $nombreArchivo);
            }else{
                $imagen = null;
                $nombreArchivo = "default.png";
            }  
            
            $complemento = [];
            if($imagen != null){
                $complemento =["imagen" => $nombreArchivo];
            }else if($r->id==null){
                $complemento =["imagen" => "default.png"];
            }

            if($r->id==null){                              
               Producto::create(array_merge($data, $complemento));
            }else{              
                Producto::where('id', $r->id)->update(array_merge($data, $complemento));
            }

            return response()->json(["status"=>200, "msj"=>"success"]);

        }catch(Exception $ex){
            Log::error('Error en la clase ' . __CLASS__ . ' en la línea ' . __LINE__ . ': ' . $ex->getMessage());
            return response()->json(["status"=>500, "msj" => "error en save"]);
        }
    }
    //lisar general
    public function listar(){
        return Producto::all();
    }

    //get general
    public function obtener(Request $r){
        return Producto::where('id', $r->id)->first();
    }

    //listar productos por proveedor
    public function listarProductosProveedorId(Request $r){
       // return Producto::where('proveedor_id', $r->proveedorId)->get();

        return DB::table('productos as pro')
            ->join('producto_estados as edo', 'pro.estado_id', 'edo.id' )
            ->join('producto_categorias as cat', 'pro.producto_categorias_id', 'cat.id')
            ->where('proveedor_id', $r->proveedorId)
            ->select('pro.id as productoId', 'pro.clave', 'pro.nombre', 'pro.descripcion', 'pro.precio', 'pro.stock', 'pro.imagen', 
            'cat.nombre as categoria', 'cat.id as categoriaId', 'pro.proveedor_id as proveedorId', 'edo.id as estadoId', 'edo.nombre as estado')
            ->get();
    }

    //getProveedor e Idproducto
    public function obtenerXProveedorEid(Request $r){
        return Producto::where('id', $r->id)->where('proveedor_id', $r->proveedorId)->first();
    }


    public function listarProductos(Request $r){
        if($r->categoria==null && $r->proveedor == null){
            //todos
            return Producto::all();
        }else if($r->categoria!=null && $r->proveedor == null){
            //solo por categoria
            return Producto::where('producto_categorias_id', $r->categoria)->get();
        }else if($r->categoria!=null && $r->proveedor!=null){
            //por categoria y proveedor
            return Producto::where('producto_categorias_id', $r->categoria)->where('proveedor_id', $r->proveedor)->get();
        }else if($r->categoria==null && $r->proveedor!=null){
            //solo por proveedor
            return Producto::where('proveedor_id', $r->proveedor)->get();
        }

    }

    public function busquedaProductos(Request $r){
        if($r->termino ==null){
            return response()->json(["status" => 402, "errors"=>["busqueda"=>["No se agrego término a la búsqueda."]]]);
        }else if($r->categoria!=null && $r->proveedor==null){
            //solo por categoria y termino
            return Producto::where('termino', 'like', "%".$r->termino."%" )->where('producto_categorias_id', $r->categoria)->get();
        }else if($r->categoria!=null && $r->proveedor!=null){
            //por categoria, proveedor y termino
            return Producto::where('termino', 'like', "%".$r->termino."%" )->where('proveedor_id', $r->proveedor)->where('producto_categorias_id', $r->categoria)->get();
        }

    }


    public function Productos(Request $r){

        $user = Auth::user();
        $dataCli = Cliente::ObtenerDataCliente($user->id);  
        $categorias = ProductoCategoria::wherenull('baja')->orwhere('baja', 0)->get();
        $productos = null;

        if($r->categoria==null&& $r->termino!=null){
            $productos = Producto::where('estado_id', '<>', 3)->where('nombre', 'like', '%'.$r->termino.'%')->get();
        }else if($r->categoria!=null&& $r->termino==null){
            $productos = Producto::where('estado_id', '<>', 3)->where('producto_categorias_id', $r->categoria)->get();
        }else{
            $productos = Producto::where('estado_id', '<>', 3)->get();
        }

        return view('Delivery.Pages.productos', compact('user', 'dataCli', 'productos', 'categorias'));
    }



}
