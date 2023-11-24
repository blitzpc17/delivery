@extends('Delivery.layout')


@section('contenido')
<ul class="row list-products auto-clear equal-container product-grid">
   
    @foreach ($productos as $p )
        <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
			<div class="product-inner equal-element">
				<div class="product-top">
                    @if($p->estado_id==1)
                        <div class="flash">
                            <span class="onnew">                            
                                <span class="text">
                                    Nuevo
                                </span>
                            </span>
                        </div>
                    @endif
				</div>
				<div class="product-thumb">
					<div class="thumb-inner">
						
                            @if($p->imagen=="default.png")
                                <img style="width: 260px; height: 300px;" src="{{asset('Admin/assets/images/productos/default.png')}}" alt="img">
                            @else
                                <img style="width: 260px; height: 300px;" src="{{asset('Admin/assets/images/productos')}}/{{$p->proveedor_id}}/{{$p->imagen}}" alt="img">
                            @endif
							
				
						<div class="thumb-group">
							<div class="loop-form-add-to-cart">
								<button onclick="addcart({{$p->id}}, 1)" class="single_add_to_cart_button button">Agregar al carrito<button>
							</div>
						</div>
					</div>
				</div>
				<div class="product-info">
					<h5 class="product-name product_title">
						<a href="#">{{$p->nombre}}</a>
					</h5>
					<div class="group-info">						
						<div class="price">							
							<ins>
								${{$p->precio}}
							</ins>
						</div>
					</div>
				</div>
			</div>
		</li>
        
    @endforeach
</ul>

@endsection


