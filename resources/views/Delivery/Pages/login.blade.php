@extends('Delivery.layout')


@push('css')
<style>
    .header-login{
        display:flex;
        justify-content:center;
    }


    .header-login img{
        width:120px;
        height:120px;
    }

</style>
@endpush

@section('contenido')
<div class="main-content main-content-login">
		<div class="container">
			<div class="row">
				<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-main">
						<h3 class="custom_blog_title">
							ITFOOD
						</h3>
						<div class="customer_login">
							<div class="row">

								<div class="col-lg-6 col-md-6 col-sm-12">
									<div  style="background:#64B5F6; box-shadow:5px 5px rgba(0,0,0,0.25); border-radius:15px;" class="login-item">
										<h5 class="title-login">Iniciar sesión</h5>
										<form class="login" method="POST" action="{{route('auth')}}">
                                            @csrf
											<div class="header-login">
                                                <img src="{{asset('Delivery/assets/images/main.png')}}" alt="logo">
                                            </div>
											<p class="form-row form-row-wide">
												<label class="text">Correo:</label>
												<input title="username" name="email" type="email" class="input-text">
											</p>
											<p class="form-row form-row-wide">
												<label class="text">Contraseña:</label>
												<input title="password" name="password" type="password" class="input-text">
											</p>
											<p class="lost_password">
												<span class="inline">
													<input type="checkbox" id="cb1">
													<label for="cb1" class="label-text">Recuerdame</label>
												</span>
												<a href="{{route('register')}}" class="forgot-pw">¿No tienes cuenta? Registrate</a>
											</p>
											<p class="form-row">
												<center><input type="submit" class="button-submit" value="Acceder"></center>
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