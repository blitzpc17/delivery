@extends('Delivery.layout')



@section('contenido')


<div class="main-content main-content-checkout">
    <div class="container">
        <h3 class="custom_blog_title">
            Mis compras
        </h3>
        <div class="checkout-wrapp">
           
            <div class="payment-method-wrapp">
                <div class="payment-method-form checkout-form">
                    
                    <div class="row-col-2 row-col">
                        <div class="your-order">
                            <h3 class="title-form">
                                Compras realizadas
                            </h3>
                            <ul id="lst-compras" class="list-product-order">
                                
                                
                            
                            </ul>                           
                        </div>
                    </div>
                </div>
             
            </div>
           
        </div>
    </div>
</div>

@endsection

