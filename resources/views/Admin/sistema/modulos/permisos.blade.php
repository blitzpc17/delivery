@extends('Admin.layout')


@section('title', 'Sistema - Permisos')


@push('css')
    
@endpush


    @section('nombreSeccion', 'Sistema - Permisos')

    @section('bread')

        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#!">Sistema</a></li>
        <li class="breadcrumb-item"><a href="#!">Ménu</a></li>
        <li class="breadcrumb-item"><a href="#!">Permisos</a></li>
        
    @endsection




    @section('contenido')

        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h5>Control de permisos</h5>
                    </div>
                    <div class="card-block">

                        <form class="form-inline" id="frm-busqueda">
                            <div class="form-group ml-2 mb-2" style="width:33%; display:flex; justify-content; space-evenly;">
                                <label for="rol">Rol:</label>
                                <select class="form-control" name="rolId" id="rol"></select>
                            </div>
                            <div class="form-group ml-2 mb-2" style="width:33%; display:flex; justify-content; space-evenly;">
                                <label for="rol">Módulo:</label>
                                <select class="form-control" name="moduloId" id="modulo"></select>
                            </div>
                            <div class="form-group ml-2 mb-2" style="display:flex; justify-content; space-evenly;">
                                <button type="submit" class="btn btn-primary mb-2">Agregar</button>
                            </div>
                           
                        </form>                      

                        <div class="table-responsive mt-5">                        
                            <table id="tb-registros" style="width:100%;" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Módulo</td>
                                        <td>Ruta</td>
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



       

        
    @endsection


@push('js')


<script>

    let tabla = null;

    $(document).ready(function () {
        console.log('Ready permisos!')

        LimpiarValidaciones();
        ListarModulosSelect();
        ListarRolesSelect();


        $('#rol').on('change', function(){
            listar($(this).val());                  
        });

        $('#frm-busqueda').on('submit', function(e){

            e.preventDefault();

            var formData = new FormData(this);

            save(formData);

        });


    });  

    function listar(rolId){
        $.ajax({
            type: "GET",
            url: "{{route('permisos.listar.rol')}}",
            data:{id: rolId},
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
            console.log(val)
            const row = `<tr>
                            <td>${i+1}</td>
                            <td>${val.nombreModulo}</td>
                            <td>${val.ruta}</td>
                            <td>                             
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
                url: "{{route('permisos.save')}}",
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
                url: "{{route('permisos.del')}}",
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
                            //listar();
                            reiniciar();
                        });
                }

            });
        })

        
    }

    function limpiar(){
        $('#modulo').val(-1).change()
        $('#rol').val(-1).change()   
    }

    function LimpiarValidaciones(){
        $('small').text('')
    }

    function reiniciar(){        
        limpiar();
        LimpiarValidaciones();
        ListarModulosSelect();
        ListarRolesSelect();
    }

    function setError(ctrlname, msj){
        $('#'+ctrlname+'_err').text(msj)
    }

    function ListarRolesSelect(){
        $('#rol').val('-1')
        $('#rol').select2({
            placeholder: {id: '-1', text: 'Seleccionar rol'},
            allowClear: true,
            width: 'resolve',
            ajax: {
                url:  "{{route('roles.select.listar')}}",
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

    function ListarModulosSelect(){
        $('#modulo').val('-1')
        $('#modulo').select2({
            placeholder: {id: '-1', text: 'Seleccionar módulo'},
            allowClear: true,
            width: 'resolve',
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