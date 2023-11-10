<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delivery - Iniciar sesión</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="crazysoftware" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('Admin/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{asset('Admin/assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('Admin/assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('Admin/assets/css/style.css')}}">

</head>

<body>
    <div class="auth-wrapper">

            <div class="auth-content subscribe">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4 col-lg-6 d-none d-md-flex d-lg-flex theme-bg align-items-center justify-content-center">
                            <img src="assets/images/user/lock.png" alt="lock images" class="img-fluid">
                        </div>
                        <div class="col-md-8 col-lg-6">
                            <div class="card-body text-center">                              
                                    <form method="post" action="{{route('admin.auth')}}">
                                        @csrf
                                        <div class="row justify-content-center">
                                            @error('unauthorizate')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  <strong>{{ $errors->first('unauthorizate') }}</strong> 
                                                </div>
                                            @enderror
                                            <div class="col-sm-10">
                                                <h3 class="mb-2">Bienvenido</h3>
                                                <p>Iniciar sesión</p>
                                                <div class="form-group mb-3">
                                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Correo electrónico">
                                                    @error('email')
                                                        <small class="form-text text-warning">{{ $errors->first('email') }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-4">
                                                    <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Contraseña">
                                                    @error('password')
                                                        <small class="form-text text-warning">{{ $errors->first('password') }}</small>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary shadow-2 mb-4">Acceder</button>
                                            </div>
                                        </div>
                                    </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <!-- Required Js -->
    <script src="{{asset('Admin/assets/js/vendor-all.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
