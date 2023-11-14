@extends('Admin.layout')


@section('title', 'Productos - Captura y consulta')


@push('css')
    
@endpush


    @section('nombreSeccion', 'Productos - Captura y consulta')

    @section('bread')

        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#!">Productos</a></li>
        <li class="breadcrumb-item"><a href="#!">Captura y consulta</a></li>
        
    @endsection




    @section('contenido')

        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h5>Productos - Captura y consulta</h5>
                    </div>
                    <div class="card-block">

                        <div class="d-flex flex-row-reverse">                           
                            <div class="p-2"><button class="btn btn-primary" onclick="nuevo()" ><i class="fas fa-plus"></i>Nuevo registro</button></div>
                        </div>

                        <div class="table-responsive">                        
                            <table id="tb-registros" style="width:100%;" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Nombre</td>                                        
                                        <td>Imagen</td>
                                        <td>Categoría</td>
                                        <td>Estado</td>
                                        <td>Acciones</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>                       
                    </div>

                </div>

            </div>



        </div>



        <!-- Modals -->
        
        <!-- Modal registro -->
        <div class="modal" id="md-registro" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form id="frm-registro" enctype="multipart/form-data">
                               
                                <input type="hidden" name="id" id="id">

                                <div class="form-group">
                                    <label for="clave"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Clave:</font></font></label>
                                    <input type="text" class="form-control" id="clave" name="clave" placeholder="">
                                    <small id="clave_err" class="form-text text-warning">_err</small>
                                </div>  
                                
                                <div class="form-group">
                                    <label for="nombre"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre:</font></font></label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
                                    <small id="nombre_err" class="form-text text-warning">_err</small>
                                </div>     

                                <div class="form-group">
                                    <label for="descripcion"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descripción:</font></font></label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="">
                                    <small id="descripcion_err" class="form-text text-warning">_err</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="precio"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Precio:</font></font></label>
                                    <input type="text" class="form-control" id="precio" name="precio" placeholder="">
                                    <small id="precio_err" class="form-text text-warning">_err</small>
                                </div> 
                                
                                <div class="form-group">
                                    <label for="estadoId"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado:</font></font></label>
                                    <select class="form-control" id="estadoId" name="estadoId">
                                    <option value="-1">Elije una estado</option>
                                        @foreach ($estados as $edo)
                                            <option value="{{$edo->id}}">{{$edo->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <small id="estadoId_err" class="form-text text-warning">_err</small>
                                </div> 

                                <div class="form-group">
                                    <label for="categoriaId"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categoría:</font></font></label>
                                    <select class="form-control" id="categoriaId" name="categoriaId">
                                        <option value="-1">Elije una categoría</option>
                                        @foreach ($categorias as $cat)
                                            <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <small id="categoriaId_err" class="form-text text-warning">_err</small>
                                </div> 

                                <!-- file manager-->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-upload"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Elije un archivo</label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="stock"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Stock:</font></font></label>
                                    <input type="text" class="form-control" id="stock" name="stock" placeholder="">
                                    <small id="stock_err" class="form-text text-warning">_err</small>
                                </div>  

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

        
    @endsection


@push('js')


<script>

    let tabla = null;

    $(document).ready(function () {
        console.log('Ready!')

        listar();
        LimpiarValidaciones();
        ReiniciarCbx();


        $('#frm-registro').on('submit', function(e){

            e.preventDefault();
            var formData = new FormData(this);
            save(formData);

        });


    });

    function nuevo(){
        console.log('nuevo')
        limpiar()
        $('.modal-title').text('Nuevo registro')
        $('#md-registro').modal('toggle')
    }

    function ver(id){
        $.ajax({
            type: "get",
            url: "{{route('productos.prov.obtener')}}",
            data: {id:id, proveedorId: "{{$proveedor->id}}"},
            dataType: "json",
            success: function (res) {
                console.log(res)
                $('#clave').val(res.clave)
                $('#descripcion').val(res.descripcion)
                $('#nombre').val(res.nombre)
                $('#precio').val(res.precio)
                $('#stock').val(res.stock)
               // $('#image').val(null)


                $('#categoriaId').val(res.producto_categorias_id).trigger('change');
                $('#estadoId').val(res.estado_id).trigger('change');
                $('#id').val(res.id)

                $('.modal-title').text('Modificar registro')
                $('#md-registro').modal('toggle')
            }
        });
  
    }

    function listar(){
        $.ajax({
            type: "get",
            url: "{{route('productos.prov.listar')}}",
            data: {proveedorId: "{{$proveedor->id}}"},
            success: function (res) {
                dibujarData(res)
            }
        });
    }

    function dibujarData(data){
        if(tabla!= null ){
            tabla.destroy();
            $('#tb-registros tbody').empty();
        }
        const ruta = "Admin/assets/images/productos/";
        $.each(data, function (i, val) { 
            const complementoImg = val.imagen=="default.png"?"default.png":"{{$proveedor->id}}"+"/"+val.imagen;
            const row = `<tr>
                            <td>${i+1}</td>
                            <td>${val.nombre}</td>
                            <td style="width:100px;"><img style="width:100%" src="{{asset('${ruta+complementoImg}')}}"></td>
                            <td>${val.categoria}</td>
                            <td>${val.estado}</td>
                            <td>
                                <button class="btn btn-icon btn-warning" onclick="ver(${val.productoId})"><i class="fas fa-edit"></i></button>                               
                            </td>
                        </tr>`
             $('#tb-registros tbody').append(row);
        });
        tabla = $('#tb-registros').DataTable({
            "language": {
                "url": "{{asset('Admin/assets/js/json/DataTables-Spanish.json')}}"
            },
        });
    }

    function save(form){
        $.ajax({
                method: "POST",
                url: "{{route('productos.save')}}",
                data: form,
                contentType: false,
                cache:false,
                processData: false,
                dataType: "json",
                success: function (res) {
                    console.log(res)
                    let tipo = "";
                    let titulo = "";
                    let msj = "";

                    if(res.status === 200){
                        tipo = "success";
                        titulo = "¡Exito!"
                        msj = "Registro guardado correctamente."
                    }else if(res.status === 500){
                        tipo = "error";
                        titulo = "¡Oh no!"
                        msj = "Ha ocurrido un error al tratar de realizar la operación. Intentalo nuevamente."
                    }else{
                        tipo = "warning";
                        titulo = "¡Advertencia!"
                        msj = "Verifica tu información e intentalo nuevamente."
                        
                    }

                    swal({
                            icon: tipo,
                            title: titulo,
                            text: msj,
                        }).then(()=>{
                            console.log("dentro: "+res.status)
                            if(res.status === 200){
                                $('#md-registro').modal('toggle')
                                reiniciar();
                            }else if(res.status === 422){
                                LimpiarValidaciones();
                                $.each(res.errors, function (i, val) { 
                                     setError(i, val);
                                });
                            }
                          
                        });
                    
                }
            });

    }

    function limpiar(){
        $('#clave').val(null)
        $('#descripcion').val(null)
        $('#nombre').val(null)
        $('#precio').val(null)
        $('#stock').val(null)
        $('#categoriaId').val(-1)
        $('#estadoId').val(-1)
        $('#image').val(null)
        $('#id').val(null)        
    }

    function LimpiarValidaciones(){
        $('small').text('')
    }

    function reiniciar(){        
        limpiar();
        listar();
        LimpiarValidaciones();
        ReiniciarCbx();
    }

    function setError(ctrlname, msj){
        $('#'+ctrlname+'_err').text(msj)
    }

    function ReiniciarCbx(){
        $('#estadoId').val(-1);
        $('#categoriaId').val(-1);
    }
    



</script>
    
@endpush