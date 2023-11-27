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
<body class="home" style="background:#BBDEFB;">
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
                        <a href="{{route('home')}}">
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
                                <a title="Categorías" href="#" class="tanajil-menu-item-title">Categorías</a>
                                <span class="toggle-submenu"></span>
                                <ul id="menu-categos" role="menu" class="submenu">
                                    <!-- <li class="menu-item">
                                        <a title="Audio" href="#" class="tanajil-item-title">Audio</a>
                                    </li>-->                                    
                                </ul>
                            </li>
                            <li class="menu-item">
                                <a title="Interior" href="{{route('home')}}" class="tanajil-menu-item-title">Inicio</a>
                            </li>
                            <li class="menu-item">
                                <a title="Lighting" href="{{route('cart')}}" class="tanajil-menu-item-title">Carrito</a>
                            </li>
                            <li class="menu-item">
                                <a title="Wheels" href="{{route('compras')}}" class="tanajil-menu-item-title">Pedidos</a>
                            </li>
                            <li class="menu-item">
                                <a title="Exterior" href="{{route('logauth')}}" class="tanajil-menu-item-title">Cerrar sesión</a>
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
                    <form class="header-searchform" id="input-search" method="GET" action="{{route('productos')}}">
                        <div class="searchform-wrap">
                            <input name="termino" type="text" class="search-input" placeholder="Ej. Papitas">
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
            <a href="{{route('cart')}}">
					<span class="icon">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        @isset($user)
						<span id="contador_carrito" class="count-icon">{{$dataCli->CarritoItems}}</span>
                        @endisset
					</span>
                <span class="text">Carrito</span>
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-user">
            <a href="{{route('compras')}}">
					<span class="icon">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</span>
                Compras
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

                   if($('#tb-cart').length){
                        listarcart();
                   }

                   if($('#contenido-carrito').length){
                        listarContenidoCarritoCheckout();
                   }

                   if($('#lst-compras').length){
                        ListarCompras();
                   }
                }
            });
        }

        function fillMenuCategos(data){
                $.each(data, function (i, val) { 
                    $('#menu-categos').append(`<li class="menu-item">
                                                    <a title="Audio" href="{{route('productos')}}?categoria=${val.id}" class="tanajil-item-title">${val.nombre}</a>
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

        @isset($user)            
        
            function addcart(proid, cant){
                $.ajax({
                    type: "GET",
                    url: "{{route('cart.update')}}",
                    data: {clienteId: {{$dataCli->ClienteId}}, productoId:proid, cantidad:cant},
                    dataType: "json",
                    success: function (res) {
                        swal({
                                icon: "success",
                                title: "¡Excelente!",
                                text: "Se ha agregado el producto a tu carrito.",
                            }).then(()=>{
                                console.log(res)
                                //refrescar el numero de abajo del cart
                                $("#contador_carrito").text(res.productos)
                            });
                        
                    }
                });
            }

            function removecart(proid){
                swal({
                    icon: "warning",
                    title: "¡Advertencia!",
                    text: "¿Desea remover el producto de su carrito de compras?",
                    buttons:true,
                    dangerMode:true
                }).then((result)=>{
                    if(result){
                        $.ajax({
                            type: "GET",
                            url: "{{route('cart.remove')}}",
                            data: {clienteId: {{$dataCli->ClienteId}}, productoId:proid},
                            dataType: "json",
                            success: function (res) {
                                swal({
                                        icon: "success",
                                        title: "¡Excelente!",
                                        text: "Se ha removido el producto de tu carrito.",
                                    }).then(()=>{
                                        listarcart();
                                    });
                                
                            }
                        });
                    }
                })
                
            }

            function listarcart(){
                $.ajax({
                    type: "GET",
                    url: "{{route('cart.listar')}}",
                    data: {clienteId:{{$dataCli->ClienteId}}},
                    dataType: "json",
                    success: function (res) {
                        $('#tb-cart tbody').empty();
                        let total = 0;
                        let item = 0;
                        $.each(res, function (i, val) { 
                            item++;
                            $('#tb-cart tbody').append(`<tr class="cart_item">
                                <td class="product-remove">
                                    <button onclick="removecart(${val.productoId})" class="remove"><i class="fa fa-trash"></i></button>
                                </td>
                                <td class="product-thumbnail">
                                
                                        <img src="{{asset('Admin/assets/images/productos')}}/${val.imagen=="default.png"?"default.png":(val.proveedorId+"/"+val.imagen)}" alt="img"
                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                
                                </td>
                                <td class="product-name" data-title="Product">
                                    <a href="#" class="title">${val.nombre}</a>
                                    <span class="attributes-select attributes-color">${val.proveedor}</span>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <div class="control">
                                            <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                            <input type="text" data-step="1" data-min="0" value="${val.cantidad}" title="Qty"
                                                class="input-qty qty" size="4">
                                            <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">
                                                    $
                                                </span>
                                                ${val.precio}
                                            </span>
                                </td>
                            </tr>`)

                            total += (val.cantidad * val.precio);
                        });

                        $('#tb-cart tbody').append(`    
                            <tr>
                                <td class="actions">                                            
                                    <div class="order-total">
                                                <span class="title">
                                                    Total:
                                                </span>
                                        <span class="total-price">
                                                    $ ${total.toFixed(2)}
                                                </span>
                                    </div>
                                </td>
                            </tr>`);

                      $("#contador_carrito").text(item)

                
                    }
                });
            }




            function listarContenidoCarritoCheckout(){
                $.ajax({
                    type: "GET",
                    url: "{{route('cart.agrupar')}}",
                    data: { clienteId:{{$dataCli->ClienteId}} },
                    dataType: "json",
                    success: function (res) {
                        let totalGlobal = 0;
                        $.each(res, function (i, prov) { 
                            let htmlproductos = "";                          
                            let totalProveedor = 0;
                             $.each(prov, function (j, val) { 

                               htmlproductos +=  `<li class="product-item-order">
                                                    <div class="product-thumb">
                                                        <a href="#">
                                                            <img src="{{asset('Admin/assets/images/productos')}}/${val.imagen=='default.png'?'default.png': val.proveedorId+"/"+val.imagen}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-order-inner">
                                                        <h5 class="product-name">
                                                            <a href="#">${val.nombre}</a>
                                                        </h5>                                                        
                                                        <div class="price">
                                                            $${val.precio}
                                                            <span class="count">x${val.cantidad}</span>
                                                        </div>
                                                    </div>
                                                </li> `;  
                                                
                                totalProveedor+= (val.precio * val.cantidad)
                                 
                             });


                             $('#contenido-carrito').append(`    
                                    <div class="row-col-2 row-col">
                                    <div class="your-order">
                                        <h3 class="title-form">
                                            Proveedor: ${i}
                                        </h3>
                                        <ul class="list-product-order">
                                           ${htmlproductos}                                             
                                        </ul>
                                        <div class="order-total">
                                                <span class="title">
                                                    Monto ($) proveedor:
                                                </span>
                                            <span class="total-price">
                                                    $ ${totalProveedor.toFixed(2)}
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                `);

                            totalGlobal += totalProveedor;

                        });



                        $('#contenido-carrito').append(`
                                                        <div class="row-col-2 row-col">
                                                            <div class="your-order">
                                                                <h3 class="title-form">
                                                                    Total a pagar($):
                                                                </h3>                                                              
                                                                <div class="order-total">
                                                                    <span class="total-price">
                                                                        $ ${totalGlobal.toFixed(2)}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        `); 


                        $('#clienteNombre').val("{{$dataCli->NombreCliente}}")

                        

                    }
                });
            }



            function GenerarPedido(){

                const puntoEntrega = $('#puntoEntrega').val();
                let formdata = new FormData();
                formdata.append('puntoEntrega', puntoEntrega);
                formdata.append('clienteId', {{$dataCli->ClienteId}})
                $.ajax({
                    method: "POST",
                    url: "{{route('pedidos.save')}}",
                    data: formdata,                   
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
                            msj = "Se han generado los pedidos "+(res.folios.join(', '))+"."
                        }else if(res.status === 500){
                            tipo = "error";
                            titulo = "¡Oh no!"
                            msj = "Ha ocurrido un error al tratar de realizar la operación. Intentalo nuevamente."
                        }else if(res.status === 117){
                            tipo = "info";
                            titulo = "¡Ojo O.o!"
                            msj = res.msj
                        }
                        else{
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
                                    window.location.href = "{{route('compras')}}";
                                }else if(res.status === 422){
                                    LimpiarValidaciones();
                                    $.each(res.errors, function (i, val) { 
                                        setError(i, val);
                                    });
                                }else if(res.status === 117){
                                    window.location.href = "{{route('productos')}}";
                                }
                            
                            });
                        
                    }
                });
            }


            function ListarCompras(){
                $.ajax({
                    type: "GET",
                    url: "{{route('pedidos.cliente.listar')}}",
                    data: {clienteId:{{$dataCli->ClienteId}}},
                    dataType: "json",
                    success: function (res) { 
                        
                        console.log(res)
                        
                        $.each(res, function (i, val) { 
                            $('#lst-compras').append(`
                                    <li class="product-item-order">
                                            <div class="product-thumb" style="text-align:center;">
                                                <a href="#">
                                                    <img style="width:180px; height:180px;" src="{{asset('Admin/assets/images/proveedores/default.png')}}" alt="img">
                                                </a>
                                            </div>
                                            <div class="product-order-inner">
                                                <p>Folio: <b>${val.Folio}</b></p>
                                                <p>Proveedor: <b>${val.RazonSocial}</b></p>
                                                <p>Fecha emisión: <b>${val.FechaEmision}</b></p>
                                                <p>Estado: <b>${val.Estado}</b></p>
                                                <div class="price">
                                                    Total del pedido: $ ${val.TotalPedido}                                             
                                                </div>
                                            </div>
                                        </li>`
                                );
                        });

                       


                    }
                });
            }

        @endisset


    </script>

@stack('js')


</body>
</html>