@extends('Delivery.layout')

@section('contenido')
<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">
           
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">
                        Carrito de compras
                    </h3>
                    <div class="page-main-content">
                        <div class="shoppingcart-content">
                             <div class="cart-form">
                                <table id="tb-cart" class="shop_table">
                                    <thead>
                                    <tr>
                                        <th class="product-remove"></th>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name"></th>
                                        <th class="product-price"></th>
                                        <th class="product-quantity"></th>
                                        <th class="product-subtotal"></th>
                                    </tr>
                                    </thead>
                                    <tbody>                                  
                                  
                                

                                    </tbody>
                                </table>
</div>
                            <div class="control-cart">
                                <a href="{{route('productos')}}" class="button btn-continue-shopping">
                                    Regresar a productos
                                </a>
                                <a href="{{route('checkout')}}" class="button btn-cart-to-checkout">
                                    Confirmar compra
                                </a>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection