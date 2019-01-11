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
.favourites{
    padding-left: 0 !important;
}

#afbeelding{
	width: 50px;
}

}
.favourites-product-img img{
    display: block;
    width: 50ppx;

}
.favourites-product-img{
    float: left;
}

.favourites-product div{
    float: left;
}

.favourites-product-info{
    width: 300;
	position: relative;
	top: 15%;
	left: 2%;
}

.favourites-product-btns{
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
                <h3>Favourites</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                @if(!empty($favourites))
                    @foreach($favourites->favouritesproducts as $product)
                    <div class="favourites-products">
                        <div class="row">
                            <div class="col-md-12 favourites-product">
                                <div class="favourites-product-image">
                                    <a href="{{ route('show', [ 'slug' => $product->product->slug]) }}"><img src="{{ asset('images/uploads/products/product_').$product->product->id.'/img_'.$product->product->main_image_url.'.png'}}" class="product-img-small"></a>
                                </div>
                                <div class="favourites-product-info">
                                    <p>{{ $product->product->title }}</p>
                                </div>
                                <div class="favourites-product-price">
                                    <p>€ {{ $product->product->price }}</p>
                                </div>
                                <div class="favourites-product-btns">
                                    <form class="remove-favourite-form" action="{{ route('favourites/create', ['id' => $product->product->slug]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="remove-favourite btn btn-small btn-danger">Remove</button>
                                    </form>
                                    <form class="add-to-cart-form" method="POST" action="{{ route('cart/create', ['slug' => $product->product->slug]) }}">
                                        {{ csrf_field() }}
                                        <button class="add-to-cart btn" type="submit">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					@if(!$loop->last)
					<hr>
					@endif
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
