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


.address-div p{
    margin: 0;
}
.quantity-input{
    width:40px;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        @include('layouts.feedback')
            <form action="" method="POST">
            {{ csrf_field() }}
                <div class="row">
                @if(Auth::guest())
                    <div class="col-md-6">
                        <h4>Info</h4>
                        <br>
                        <p>{{ session('order')['info']['email']}}</p>
                        <p>{{ session('order')['info']['firstname']}} {{ session('order')['info']['lastname']}}</p>
                    </div>
                    <div class="col-md-3 address-div">
                        <h4>Delivery address</h4>
                        <br>
                        <p>{{ session('order')['delivery_address']['street']}}</p>
                        <p>{{ session('order')['delivery_address']['house_number']}}</p>
                        <p>{{ session('order')['delivery_address']['suffix']}}</p>
                        <p>{{ session('order')['delivery_address']['zipcode']}}</p>
                        <p>{{ session('order')['delivery_address']['city']}}</p>
                        <p>{{ session('order')['delivery_address']['country']}}</p>
                    </div>
                    <div class="col-md-3 address-div">
                        <h4>Billing address</h4>
                        <br>
                    @if(session('order')['billing_address'] == "same")
                        <p>Same as delivery address</p>
                    @else
                        <p>{{ session('order')['billing_address']['street']}}</p>
                        <p>{{ session('order')['billing_address']['house_number']}}</p>
                        <p>{{ session('order')['billing_address']['suffix']}}</p>
                        <p>{{ session('order')['billing_address']['zipcode']}}</p>
                        <p>{{ session('order')['billing_address']['city']}}</p>
                        <p>{{ session('order')['billing_address']['country']}}</p>
                    @endif
                    </div>
                @else
                    <div class="col-md-6">
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->member->firstname }}</p>
                        <p>{{ $user->member->insertion }} {{ $user->member->lastname }}</p>
                    </div>
                    <div class="col-md-3 address-div">
                        <p>{{ $addresses['delivery_address']['street'] }}</p>
                        <p>{{ $addresses['delivery_address']['house_number'] }}{{ $addresses['delivery_address']['suffix'] }}</p>
                        <p>{{ $addresses['delivery_address']['zipcode'] }}</p>
                        <p>{{ $addresses['delivery_address']['city'] }}</p>
                        <p>{{ $addresses['delivery_address']['country'] }}</p>
                    </div>
                    <div class="col-md-3 address-div">
                    @if($addresses['billing_address'] == $addresses['delivery_address'])
                        <p>Same as delivery address</p>
                    @else
                        <p>{{ $addresses['billing_address']['street'] }}</p>
                        <p>{{ $addresses['billing_address']['house_number'] }}</p>
                        <p>{{ $addresses['billing_address']['suffix'] }}</p>
                        <p>{{ $addresses['billing_address']['zipcode'] }}</p>
                        <p>{{ $addresses['billing_address']['city'] }}</p>
                        <p>{{ $addresses['billing_address']['country'] }}</p>
                    @endif
                    </div>
                @endif
                </div>
                <hr>
                <div class="row">
                @foreach($products as $key => $product)
                    <div class="col-md-12 cart-product">
                        <div class="cart-product-image">
                            @if(Auth::guest())
                            <img src="{{ asset('images/uploads/products/product_').$key.'/img_'.$product['main_image_url'].'.png' }}" id="afbeelding">
                            @else
                            <img src="{{ asset('images/uploads/products/product_').$product->product->id.'/img_'.$product->product->main_image_url.'.png'}}" id="afbeelding">
                            @endif
                        </div>
                        <div class="cart-product-info">
                            <p>{{ $guest ? $product['title'] : $product->product->title }}</p>
                        </div>
                        <div class="cart-product-price">
                            <p>{{ $guest ? $product['quantity'] : $product->quantity }}</p>
                            <p>€{{ $guest ? $product['price'] : $product->product->price }}</p>
                        </div>
                    </div>
                @endforeach
                </div>
                <hr>
                <p>Total price: €{{ $price }}</p>
                <div class="row">
                    <div class="col-md-12">
                        <button style="float: right" type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')