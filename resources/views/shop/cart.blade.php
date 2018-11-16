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

.cart-product-delete{
    float: right !important;
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
                                    <a href="{{ route('show', [ 'slug' => $product->product->slug]) }}"><img src="{{ asset('images/uploads/products/product_').$product->product->id.'/img_'.$product->product->main_image_url.'.png'}}" id="afbeelding"></a>
                                </div>
                                <div class="cart-product-info">
                                    <p>{{ $product->product->title }}</p>
                                </div>
                                <form action="{{ route('cart/update', ['id' => $product->id]) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="cart-product-price">
                                    <!-- <input type="number" class="quantity-input" name="quantity" value="{{ $product->quantity }}"> -->
                                    <select name="quantity" onchange="this.form.submit()">
                                    {{ $max = $product->quantity > 3 ? $product->quantity+3 : $product->quantity+4+3-$product->quantity}}
                                    @for ($i = $product->quantity > 3 ? $product->quantity-3 : 1; $i <= $max; $i++)
                                        <option value="{{ $i }}" @if($i == $product->quantity) selected @endif>{{ $i }}</option>
                                    @endfor
                                    </select>
                                    <p>€ {{ $product->product->price }}</p>
                                </div>
                                </form>
                                <form action="{{ route('cart/delete', ['id' => $product->id]) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="cart-product-delete">
                                    <button type="submit" class="btn btn-small btn-danger">Remove</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
					@if(!$loop->last)
					<hr>
					@endif
                    @endforeach
                @endif
                </div>
                <div class="col-md-4">
                    <div class="cart-price">
                        <p>Total amount: € {{ $price }}</p>
                    </div>
					<hr>
					<button type="submit" class="btn btn-primary" style="width: 50%;">Check out</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')