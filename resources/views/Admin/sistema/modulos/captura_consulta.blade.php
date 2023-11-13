@extends('Admin.layout')


@section('title', 'Sistema - Módulos')


@push('css')
    
@endpush


    @section('nombreSeccion', 'Sistema - Módulos')

    @section('bread')

        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#!">Sistema</a></li>
        <li class="breadcrumb-item"><a href="#!">Ménu</a></li>
        <li class="breadcrumb-item"><a href="#!">Módulos</a></li>
        
    @endsection




    @section('contenido')

        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h5>Módulos</h5>
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
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
                                    <small id="nombre_err" class="form-text text-warning">_err</small>
                                </div>  
                                
                                <div class="form-group">
                                    <label for="ruta"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ruta:</font></font></label>
                                    <input type="text" class="form-control" id="ruta" name="ruta" placeholder="">
                                    <small id="ruta_err" class="form-text text-warning">_err</small>
                                </div>     

                                <div class="form-group">
                                    <label for="moduloId"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Modulo padre:</font></font></label>
                                    <select class="form-control" id="moduloId" name="moduloId"></select>
                                    <small id="moduloId_err" class="form-text text-warning">_err</small>
                                </div>  
                                
                                <div class="form-group">
                                    <label for="icono"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Icono:</font></font></label>
                                    <input type="text" class="form-control" id="icono" name="icono" placeholder="">
                                    <small id="icono_err" class="form-text text-warning">_err</small>
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
        ListarModulos();


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
            url: "{{route('modulos.obtener')}}",
            data: {id:id},
            dataType: "json",
            success: function (res) {
                $('#icono').val(res.icono);
                $('#nombre').val(res.nombre);
                $('#ruta').val(res.ruta);
                $('#moduloId').val(res.modulo_padre_id);
                $('#id').val(res.id)

                $('.modal-title').text('Modificar registro')
                $('#md-registro').modal('toggle')
            }
        });
  
    }

    function listar(){
        $.ajax({
            type: "get",
            url: "{{route('modulos.listar')}}",
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
                                <button class="btn btn-icon ${val.baja?"btn-secondary":"btn-danger"}" onclick="eliminar(${val.id}, ${val.baja?0:1})"><i class="${val.baja?"feather icon-thumbs-up":"feather icon-thumbs-down"}"></i></button>
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
                url: "{{route('modulos.save')}}",
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
                                $.each(res.errors, function (i, val) { 
                                     setError(i, val);
                                });
                            }
                          
                        });
                    
                }
            });

    }

    function eliminar(id, edo){
        let data = null;
        swal({
            icon:"warning",
            title:"Advertencia",
            text:"¿Desea "+(edo==1?"DESACTIVAR":"ACTIVAR")+" el registro?",
            buttons: true
        }).then((value)=>{
            if(!value)return;
            var formData = new FormData();
            formData.append('id',id);
            formData.append('baja',edo);
            $.ajax({
                method: "POST",
                url: "{{route('modulos.del')}}",
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
                        msj = "Registro "+(edo==1?"DESACTIVADO":"ACTIVADO")+" correctamente."
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
        $('#icono').val(null)
        $('#nombre').val(null)
        $('#ruta').val(null)
        $('#moduloId').val(null)
        $('#id').val(null)        
    }

    function LimpiarValidaciones(){
        $('small').text('')
    }

    function reiniciar(){        
        limpiar();
        listar();
        LimpiarValidaciones();
        ListarModulos();
    }

    function setError(ctrlname, msj){
        $('#'+ctrlname+'_err').text(msj)
    }

    function ListarModulos(){
        $('#moduloId').val('-1')
        $('#moduloId').select2({
        placeholder: {id: '-1', text: 'Seleccionar opción'},
        allowClear: true,
        width: 'resolve',
        dropdownParent: $("#md-registro"),
        ajax: {
            url:  "{{route('modulos.select.listar')}}",
            dataType: 'json',
            data: function (params) {
                return {p: $.trim(params.term)};
            },
            processResults: function (data) {
                return {results: data};
            },
            cache: true
        },
    });
    }



</script>
    
@endpush