@extends('Delivery.layout')

@push('css')


    
@endpush
   

@section('contenido')



<div class="main-content main-content-login">
		<div class="container">
			
			<div class="row">
				<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-main">
						<h3 class="custom_blog_title" style="text-align:center;">
							Registro de usuario
						</h3>
						<div class="customer_login">
							<div class="row">
								
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="login-item">
										<h5 class="title-login">Unete a ITFood</h5>
										<form class="register" id="frm-registro">
                                            <input type="hidden" name="tipo" value="U">
                                            <input type="hidden" name="rolId" value="3">
                                            <p class="form-row form-row-wide">
												<label class="text">Nombre(s):</label>
												<input title="nombres" type="text" name="nombres" id="nombres" class="input-text">
											</p>

                                            <p class="form-row form-row-wide">
												<label class="text">Apellido(s):</label>
												<input title="apellidos" type="text" name="apellidos" id="apellidos" class="input-text">
											</p>

                                            <p class="form-row form-row-wide">
												<label class="text">Fecha nacimiento:</label>
												<input title="fechaNacimiento" type="text" name="fechaNacimiento" id="fechaNacimiento" class="input-text">
											</p>

                                            <p class="form-row form-row-wide">
												<label class="text">Sexo:</label>
												<input title="sexo" type="text" name="sexo" id="sexo" class="input-text">
											</p>

                                            <p class="form-row form-row-wide">
												<label class="text">Télefono:</label>
												<input title="telefono" type="text" name="telefono" id="telefono" class="input-text">
											</p>

											<p class="form-row form-row-wide">
												<label class="text">Correo electrónico:</label>
												<input title="email" type="email" name="email" id="email" class="input-text">
											</p>
											<p class="form-row form-row-wide">
												<label class="text">Usuario</label>
												<input title="name" type="text" name="name" id="name" class="input-text">
											</p>
											<p class="form-row form-row-wide">
												<label class="text">Contraseña</label>
												<input title="password" type="password" name="password" id="password" class="input-text">
											</p>
											<p class="form-row">
												<span class="inline">
													<input type="checkbox" id="cb2">
													<label for="cb2" class="label-text">He leído y acepto los <span>Términos y condiciones</span></label>
												</span>
											</p>
											<p class="">
												<center><input type="submit" class="button-submit" value="Enviar"></center>
											</p>
										</form>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




@endsection


@push('js')

<script>
    $(document).ready(function () {
        console.log("register...")

        $('#frm-registro').on('submit', function(e){
            e.preventDefault();          
            var formData = new FormData(this);
            save(formData);
        })

    });



    function save(form){
        $.ajax({
                method: "POST",
                url: "{{route('singup')}}",
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
                                //redirect
                                window.location.href = "{{route('login')}}";
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


</script>
    
@endpush