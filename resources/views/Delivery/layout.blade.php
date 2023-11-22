<!DOCTYPE html>
<html lang="en">
<head>
    <title>ITFOOD</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="crazysoftware" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('Delivery/assets/images/favicon.png')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/js/fancybox/source/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/jquery.scrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/mobile-menu.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/fonts/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('Delivery/assets/css/style.css')}}">



@stack('css')

</head>
<body class="home">
<header class="header style7">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="header-message">
                    Bienvenido a ITFOOD
                </div>
            </div>
            <div class="top-bar-right">                
                <ul class="header-user-links">
                    <li>
                        <a href="login.html">Accede o Registrate</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-header">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{asset('Delivery/assets/images/comida-med.png')}}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                    <div class="block-search-block">
                        <form class="form-search form-search-width-category">
                            <div class="form-content">                                
                                <div class="inner">
                                    <input type="text" class="input" name="s" value="" placeholder="Buscar...">
                                </div>
                                <button class="btn-search" type="submit">
                                    <span class="icon-search"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                    <div class="header-control">
                        <div class="block-minicart tanajil-mini-cart block-header tanajil-dropdown">
                            <a href="javascript:void(0);" class="shopcart-icon" data-tanajil="tanajil-dropdown">
                                Cart
                                <span class="count">
										0
										</span>
                            </a>
                            <!-- shopcart-->
                            <div class="shopcart-description tanajil-submenu">
                                <div class="content-wrap">
                                    <h3 class="title">Shopping Cart</h3>
                                    <ul class="minicart-items">
                                        <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="assets/images/item-minicart-1.jpg" alt="img">
                                            </a>
                                            <div class="product-details">
                                                <h5 class="product-name">
                                                    <a href="#">Wheel With Inserts</a>
                                                </h5>
                                                <div class="variations">
															<span class="attribute_color">
																<a href="#">Black</a>
															</span>
                                                    ,
                                                    <span class="attribute_size">
																<a href="#">300ml</a>
															</span>
                                                </div>
                                                <span class="product-price">
															<span class="price">
																<span>$45</span>
															</span>
														</span>
                                                <span class="product-quantity">
															(x1)
														</span>
                                                <div class="product-remove">
                                                    <a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="assets/images/item-minicart-2.jpg" alt="img">
                                            </a>
                                            <div class="product-details">
                                                <h5 class="product-name">
                                                    <a href="#">Soap Wheels Solutions</a>
                                                </h5>
                                                <div class="variations">
															<span class="attribute_color">
																<a href="#">Black</a>
															</span>
                                                    ,
                                                    <span class="attribute_size">
																<a href="#">300ml</a>
															</span>
                                                </div>
                                                <span class="product-price">
															<span class="price">
																<span>$45</span>
															</span>
														</span>
                                                <span class="product-quantity">
															(x1)
														</span>
                                                <div class="product-remove">
                                                    <a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="product-cart mini_cart_item">
                                            <a href="#" class="product-media">
                                                <img src="assets/images/item-minicart-3.jpg" alt="img">
                                            </a>
                                            <div class="product-details">
                                                <h5 class="product-name">
                                                    <a href="#">Wheels Solutions Soap</a>
                                                </h5>
                                                <div class="variations">
															<span class="attribute_color">
																<a href="#">Black</a>
															</span>
                                                    ,
                                                    <span class="attribute_size">
																<a href="#">300ml</a>
															</span>
                                                </div>
                                                <span class="product-price">
															<span class="price">
																<span>$45</span>
															</span>
														</span>
                                                <span class="product-quantity">
															(x1)
														</span>
                                                <div class="product-remove">
                                                    <a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="subtotal">
                                        <span class="total-title">Subtotal: </span>
                                        <span class="total-price">
													<span class="Price-amount">
														$135
													</span>
												</span>
                                    </div>
                                    <div class="actions">
                                        <a class="button button-viewcart" href="shoppingcart.html">
                                            <span>View Bag</span>
                                        </a>
                                        <a href="checkout.html" class="button button-checkout">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end shopcart-->
                        </div>
                        <div class="block-account block-header tanajil-dropdown">
                            <a href="javascript:void(0);" data-tanajil="tanajil-dropdown">
                                <span class="flaticon-user"></span>
                            </a>
                            <div class="header-account tanajil-submenu">
                                <div class="card-header-data-usuario">
                                    <img src="{{asset('Delivery/assets/images/')}}" alt="img-user">
                                    <p>Nombre cliente</p>
                                </div>
                                <div class="card-options-usuario">
                                    <ul>
                                        <li><a href="#">Cerrar sesión</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a class="menu-bar mobile-navigation menu-toggle" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav-container rows-space-20">
        <div class="container">
            <div class="header-nav-wapper main-menu-wapper">
                <div class="vertical-wapper block-nav-categori">
                    <div class="block-title">
							<span class="icon-bar">
								<span></span>
								<span></span>
								<span></span>
							</span>
                        <span class="text">Categorías</span>
                    </div>
                    <!-- categorias-->
                    <div class="block-content verticalmenu-content">
                        <ul class="tanajil-nav-vertical vertical-menu tanajil-clone-mobile-menu">
                           
                            <li class="menu-item menu-item-has-children">
                                <a title="Accessories" href="#" class="tanajil-menu-item-title">Categorías</a>
                                <span class="toggle-submenu"></span>
                                <ul id="menu-categos" role="menu" class=" submenu">
                                    <!-- <li class="menu-item">
                                        <a title="Audio" href="#" class="tanajil-item-title">Audio</a>
                                    </li>-->                                    
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a title="Interior" href="{{route('home')}}" class="tanajil-menu-item-title">Inicio</a>
                            </li>
                            <li class="menu-item">
                                <a title="Lighting" href="#" class="tanajil-menu-item-title">Carrito</a>
                            </li>
                            <li class="menu-item">
                                <a title="Wheels" href="#" class="tanajil-menu-item-title">Pedidos</a>
                            </li>
                            <li class="menu-item">
                                <a title="Exterior" href="#" class="tanajil-menu-item-title">Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>
                     <!--end  categorias-->
                </div>
           
            </div>
        </div>
    </div>
</header>
<!-- movil -->
<div class="header-device-mobile">
    <div class="wapper">
        <div class="item mobile-logo">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('Delivery/assets/images/main-mini.png')}}" alt="logo">
                </a>
            </div>
        </div>
        <div class="item item mobile-search-box has-sub">
            <a href="#">
						<span class="icon">
							<i class="fa fa-search" aria-hidden="true"></i>
						</span>
            </a>
            <div class="block-sub">
                <a href="#" class="close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="header-searchform-box">
                    <form class="header-searchform" id="input-search" method="POST" action="{{route('productos')}}">
                        <div class="searchform-wrap">
                            <input type="text" class="search-input" placeholder="Ej. Papitas">
                            <input type="submit" class="submit button" value="Buscar">
                        </div>
                    </form>
                </div>
            </div>
        </div>       
        <div class="item menu-bar">
            <a class=" mobile-navigation  menu-toggle" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>
</div>




@section('contenido')

@show

<!--
<footer class="footer style7">
    <div class="container">
        <div class="container-wapper">
            <div class="row">
                <div class="box-footer col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="widget-box">
                        <div class="single-img">
                            <a href="index.html"><img src="assets/images/logo-light.png" alt="img"></a>
                        </div>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="#"><span class="flaticon-placeholder"></span>45 Grand Central Terminal New
                                    York,NY 1017 United State USA</a>
                            </li>
                            <li class="menu-item">
                                <a href="#"><span class="fa fa-phone"></span>(+123) 456 789 - (+123) 666 888</a>
                            </li>
                            <li class="menu-item">
                                <a href="#"><span class="fa fa-envelope-o"></span>Contact@yourcompany.com</a>
                            </li>
                            <li class="menu-item">
                                <a href="#"><span class="flaticon-clock"></span>Mon-Sat 9:00pm - 5:00pm Sun : Closed</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-6 col-md-6 col-lg-2">
                    <div class="tanajil-custommenu default">
                        <h2 class="widgettitle">Quick Menu</h2>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="#">New arrivals</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Life style</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Interior</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Lighting</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Wheels</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-6 col-md-6 col-lg-2">
                    <div class="tanajil-custommenu default">
                        <h2 class="widgettitle">Information</h2>
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="#">FAQs</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Track Order</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Delivery</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Contact Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Return</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box-footer col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="tanajil-newsletter style1">
                        <div class="newsletter-head">
                            <h3 class="title">Newsletter</h3>
                        </div>
                        <div class="newsletter-form-wrap">
                            <div class="list">
                                Get notified of new products, limited releases, and more.
                            </div>
                            <input type="email" class="input-text email email-newsletter"
                                   placeholder="Your email letter">
                            <button class="button btn-submit submit-newsletter">SUBSCRIBE</button>
                        </div>
                    </div>
                    <div class="tanajil-socials">
                        <ul class="socials">
                            <li>
                                <a href="#" class="social-item" target="_blank">
                                    <i class="icon fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-item" target="_blank">
                                    <i class="icon fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-item" target="_blank">
                                    <i class="icon fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 border-custom">
                    <span></span>
                </div>
            </div>
            <div class="footer-end">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="coppyright">
                            Copyright © 2019
                            <a href="#">Tanajil</a>
                            . All rights reserved
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="tanajil-payment">
                            <img src="assets/images/payments.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
-->

<div class="footer-device-mobile">
    <div class="wapper">
        <div class="footer-device-mobile-item device-home">
            <a href="{{route('home')}}">
					<span class="icon">
						<i class="fa fa-home" aria-hidden="true"></i>
					</span>
                Inicio
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-wishlist">
            <a href="{{route('productos')}}">
					<span class="icon">
						<i class="fa fa-dropbox" aria-hidden="true"></i>
					</span>
                Productos
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-cart">
            <a href="#">
					<span class="icon">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
						<span class="count-icon">0</span>
					</span>
                <span class="text">Carrito</span>
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-user">
            <a href="login.html">
					<span class="icon">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</span>
                Pedidos
            </a>
        </div>
    </div>
</div>


<a href="#" class="backtotop">
    <i class="fa fa-angle-double-up"></i>
</a>





<script src="{{asset('Delivery/assets/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/jquery.plugin-countdown.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/jquery-countdown.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/isotope.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/mobile-menu.js')}}"></script>
<script src="{{asset('Delivery/assets/js/chosen.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/slick.js')}}"></script>
<script src="{{asset('Delivery/assets/js/jquery.elevateZoom.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/jquery.actual.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/fancybox/source/jquery.fancybox.js')}}"></script>
<script src="{{asset('Delivery/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/owl.thumbs.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('Delivery/assets/js/frontend-plugin.js')}}"></script>

    <!-- sweet alert Js -->
    <script src="{{asset('Admin/assets/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('Admin/assets/js/pages/ac-alert.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        let categorias = null;
        $(document).ready(function () {
            init();          

        });

        function init(){         
            listar();
        }

        function listar(){
            $.ajax({
                type: "GET",
                url: "{{route('categorias')}}",
                dataType: "json",
                success: function (res) {                    
                   categorias = res;
                   fillMenuCategos(res);

                   if($('#row-categos'.length)){
                        dibujarCategorias(res);
                   }
                }
            });
        }

        function fillMenuCategos(data){
                $.each(data, function (i, val) { 
                    $('#menu-categos').append(`<li class="menu-item">
                                                    <a title="Audio" href="#" class="tanajil-item-title">${val.nombre}</a>
                                                </li>`)
                });
        }



        function dibujarCategorias(data){
            $.each(data, function (i, val) { 

                $('#row-categos').append(
                    `<div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="banner">
                            <div class="item-banner style5">
                                <div class="inner" style="background-image:url(${ "{{asset('Delivery/assets/images/categorias')}}/"+val.imagen}")>
                                    <div class="banner-content" style="background-color: rgba(0, 0, 0, 0.25);">
                                        <h3 class="title" style="font-weight:bolder;">${val.nombre}</h3>                                        
                                        <a href="{{route('productos')}}?categoria=${val.id}" class="button btn-shop-now">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
            );
                 
            });
           
        }


    </script>

@stack('js')


</body>
</html>