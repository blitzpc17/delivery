@extends('Delivery.layout')


@section('contenido')

<div class="main-content main-content-checkout">
    <div class="container">
        <h3 class="custom_blog_title">
            Checkout
        </h3>
        <div class="checkout-wrapp">
            <div class="shipping-address-form-wrapp">
                <div id="contenido-carrito" class="shipping-address-form  checkout-form">
                    <div class="row-col-1 row-col">
                        <div class="shipping-address">
                            <h3 class="title-form">
                                Datos de la entrega
                            </h3>
                            <p class="form-row form-row-first">
                                <label class="text">Nombre cliente:</label>
                                <input id="clienteNombre" title="first" type="text" class="input-text" readonly>
                            </p>                        
                            <p class="form-row form-row-last">
                                <label class="text">Punto de entrega</label>
                                <input title="puntoentrega" name="puntoEntrega" id="puntoEntrega" type="text" class="input-text">
                            </p>
                        </div>
                    </div>

                    <!-- carrito por proveedor-->
                  

                    <!-- end carrito por proveedor-->
                </div>
                <div class="button-control">
                    <a href="{{route('productos')}}" class="button btn-back-to-shipping"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Volver a productos</font></font></a>
                    <button id="btn-generar-pedido" onclick="GenerarPedido();" class="button btn-pay-now"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Confirmar pedido(s)</font></font></button>
                </div>
            </div>
       
        
        </div>
    </div>
</div>


@endsection

