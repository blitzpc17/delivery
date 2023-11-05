@extends('Admin.layout')


@section('title', 'Catálogos - Roles')


@push('css')
    
@endpush


    @section('nombreSeccion', 'Catálogos - Roles')

    @section('bread')

        <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#!">Cátalogos</a></li>
        <li class="breadcrumb-item"><a href="#!">Roles</a></li>
        
    @endsection




    @section('contenido')

        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h5>Roles</h5>
                    </div>
                    <div class="card-block">

                        <div class="d-flex flex-row-reverse">                           
                            <div class="p-2"><button class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo registro</button></div>
                        </div>

                        <div class="table-responsive">                        
                            <table style="width:100%;" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Nombre</td>
                                        <td>Acciones</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-icon btn-warning"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>                       
                    </div>

                </div>

            </div>



        </div>



        <!-- Modals -->
        
        <!-- Modal registro -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                            <form action="">
                                @csrf

                                <input type="hidden" name="id" id="id">

                                <div class="form-group">
                                    <label for="nombre"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre:</font></font></label>
                                    <input type="email" class="form-control" id="nombre" placeholder="Ej. master">
                                    <small id="nombre_err" class="form-text text-muted"><font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;"></font>alerta</font>
                                    </small>
                                </div>


                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
                
            });
        </script>
        

        
    @endsection


@push('js')


<script>

    let tabla = null;

    $(document).ready(function () {
        console.log('Ready!')




    });

    function ver(){

    }

    function listar(){

    }

    function save(){

    }



</script>
    
@endpush