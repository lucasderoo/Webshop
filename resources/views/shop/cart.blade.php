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

.cart-product-img img{
    display: block;
    max-width: 125px;
    height: auto;
}
.cart-product-img{
    float: left;
}

.cart-product div{
    float: left;
}

.cart-product-info{
    width: 300px;
}

.quantity-input{
    width:40px;
}
</style>
<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2 products-index">
        @include('layouts.feedback')
            <div class="admin-top">
                <h3>Cart ({{ $productsCount }} product{{ $productsCount > 1 ? 's' : '' }})</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                @if(!empty($user->basket))
                    @foreach($user->basket->basketproducts as $product)
                    <div class="cart-products">
                        <div class="row">
                            <div class="col-md-12 cart-product">
                                <div class="cart-product-image">
                                    <img src="{{ asset('images/uploads/products/product_').$product->product->id.'/img_'.$product->product->main_image_url.'.png'}}">
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
                    <br>
                    @endforeach
                @endif
                </div>
                <div class="col-md-4">
                    <div class="cart-price">
                        <p>Price</p>

                        <p>Amount: € {{ $price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')