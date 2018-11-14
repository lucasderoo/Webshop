@include('layouts.header')
<style>
.admin-top  h3{
    float: left;
}
.admin-top  a{
    float: right;
}
.admin-top {
    height: 38px;
}
.cart{
    padding-left: 0 !important;
}

#afbeelding{
	width: 50px;
}

}
.cart-product-img img{
    display: block;
    width: 50ppx;

}
.cart-product-img{
    float: left;
}

.cart-product div{
    float: left;
}

.cart-product-info{
    width: 300;
	position: relative;
	top: 15%;
	left: 2%;
}



.quantity-input{
    width:40px;
}
</style>
<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2 products-index">
            <div class="admin-top">
                <h3>Cart ({{ $productsCount }} products)</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    @foreach($user->basket->basketproducts as $product)
                    <div class="cart-products">
                        <div class="row">
                            <div class="col-md-12 cart-product">
                                <div class="cart-product-image">
                                    <img src="{{ asset('images/uploads/products/product_').$product->product->id.'/img_'.$product->product->main_image_url.'.png'}}" id="afbeelding">
                                </div>
                                <div class="cart-product-info">
                                    <p>{{ $product->product->title }}</p>
                                </div>
                                <div class="cart-product-price">
                                    <input type="number" class="quantity-input" name="quantity" value="{{ $product->quantity }}">
                                     <p>€ {{ $product->product->price }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
					@if(!$loop->last)
					<hr>
					@endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="cart-price">
                        <p>Total amount: € {{ $price }}</p>
                    </div>
					<hr>
					<button type="submit" class="btn btn-primary" style="width: 50%;">Check out</button>
                </div>
            </div>
			<hr>
        </div>
    </div>
</div>
@include('layouts.footer')