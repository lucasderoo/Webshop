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

.afbeelding{
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
                @if(!empty($products))
                    @foreach($products as $key => $product)
                    <div class="cart-products">
                        <div class="row">
                            <div class="col-md-12 cart-product">
                                <div class="cart-product-image">
                                    @if(Auth::guest())
                                    <a href="{{ route('show', [ 'slug' => $product['slug']])  }}"><img src="{{ asset('images/uploads/products/product_').$key.'/img_'.$product['main_image_url'].'.png' }}" class="afbeelding"></a>
                                    @else
                                    <a href="{{ route('show', [ 'slug' => $product->product->slug]) }}"><img src="{{ asset('images/uploads/products/product_').$product->product->id.'/img_'.$product->product->main_image_url.'.png'}}" class="afbeelding"></a>
                                    @endif
                                </div>
                                <div class="cart-product-info">
                                    <p>{{ $guest ? $product['title'] : $product->product->title }}</p>
                                </div>
                                <form action="{{ route('cart/update', ['id' => $guest ? $key : $product->product->id]) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="cart-product-price">
                                    <select name="quantity" onchange="this.form.submit()">
                                    @if(Auth::guest())
                                        {{ $max = $product['quantity'] > 3 ? $product['quantity']+3 : $product['quantity']+4+3-$product['quantity']}}
                                    @for ($i = $product['quantity'] > 3 ? $product['quantity']-3 : 1; $i <= $max; $i++)
                                        <option value="{{ $i }}" @if($i == $product['quantity']) selected @endif>{{ $i }}</option>
                                    @endfor
                                    @else
                                    {{ $max = $product->quantity > 3 ? $product->quantity+3 : $product->quantity+4+3-$product->quantity}}
                                    @for ($i = $product->quantity > 3 ? $product->quantity-3 : 1; $i <= $max; $i++)
                                        <option value="{{ $i }}" @if($i == $product->quantity) selected @endif>{{ $i }}</option>
                                    @endfor
                                    @endif
                                    </select>
                                    <p>€ {{ $guest ? $product['price'] : $product->product->price }}</p>
                                </div>
                                </form>
                                <form action="{{ route('cart/delete', ['id' => $guest ? $key : $product->product->id]) }}" method="POST">
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
                    <a class="btn btn-small btn-info" href="{{ route('checkout') }}">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')