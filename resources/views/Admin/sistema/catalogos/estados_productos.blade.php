@extends('Admin.layout')


@section('title', 'Catálogos - Estados Productos')


@push('css')
    
@endpush


    @section('nombreSeccion', 'Catálogos - Estados Productos')

    @section('bread')

        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#!">Cátalogos</a></li>
        <li class="breadcrumb-item"><a href="#!">Estados Productos</a></li>
        
    @endsection




    @section('contenido')

        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h5>Estados de productos</h5>
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
                            <form id="frm-registro">
                               
                                <input type="hidden" name="id" id="id">

                                <div class="form-group">
                                    <label for="nombre"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre:</font></font></label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. master">
                                    <small id="nombre_err" class="form-text text-muted"><font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"></font>alerta</font>
                                    </small>
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
            url: "{{route('edopro.obtener')}}",
            data: {id:id},
            dataType: "json",
            success: function (res) {

                $('#nombre').val(res.nombre);
                $('#id').val(res.id)

                $('.modal-title').text('Modificar registro')
                $('#md-registro').modal('toggle')
            }
        });
  
    }

    function listar(){
        $.ajax({
            type: "get",
            url: "{{route('edopro.listar')}}",
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
        $.each(data, function (i, val) { 
            const row = `<tr>
                            <td>${i+1}</td>
                            <td>${val.nombre}</td>
                            <td>
                                <button class="btn btn-icon btn-warning" onclick="ver(${val.id})"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-icon btn-danger" onclick="eliminar(${val.id})"><i class="fas fa-trash"></i></button>
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
                url: "{{route('edopro.save')}}",
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
                            $('#md-registro').modal('toggle')
                            reiniciar();
                        });
                    
                }
            });

    }

    function eliminar(id){
        let data = null;
        swal({
            icon:"warning",
            title:"Advertencia",
            text:"¿Desea eliminar el registro?",
            buttons: true
        }).then((value)=>{
            if(!value)return;
            var formData = new FormData();
            formData.append('id',id);
            $.ajax({
                method: "POST",
                url: "{{route('edopro.del')}}",
                data: formData,
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
                        msj = "Registro eliminado correctamente."
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
                            listar();
                        });
                }

            });
        })

        
    }

    function limpiar(){
        $('#nombre').val(null)
        $('#id').val(null)        
    }

    function reiniciar(){        
        limpiar();
        listar();
    }



</script>
    
@endpush