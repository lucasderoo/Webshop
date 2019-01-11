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
        <div>
            <h1>Order #{{ $order->id}}</h1>
        </div>
        <hr>
        @include('layouts.feedback')
            <div class="row">

                <div class="col-md-4">
                    <h3>Details</h3>
                    <p>{{ $order->firstname }} {{ $order->lastname }}</p>
                    <p>{{ $order->email}}</p>
                    <p><strong>Total price:</strong> €{{ $order->amount }}</p>
                    <p>
                    <?php $statuss = array('paid','delivered','canceled'); ?>
                    <form id="status-form" role="form" method="POST" action="">
                    {{ csrf_field() }}
                    <strong>Status: <select name="status" onchange="document.getElementById('status-form').submit();">
                    @foreach($statuss as $status)
                        <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                    </select>
                    </strong></p>
                    </form>
                </div>
                <div class="col-md-4">
                    <h3>Delivery address</h3>
                    <p>{{ $order->address->street }} {{ $order->address->house_number }}{{ $order->address->suffix }}</p>
                    <p>{{ $order->address->zipcode }} {{ $order->address->city }}</p>
                    <p>{{ $order->address->country }}</p>
                </div>
                <div class="col-md-4">
                    <h3>Billing address</h3>
                    <p>{{ $order->billing_address->street }} {{ $order->billing_address->house_number }}{{ $order->billing_address->suffix }}</p>
                    <p>{{ $order->billing_address->zipcode }} {{ $order->billing_address->city }}</p>
                    <p>{{ $order->billing_address->country }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
            @foreach($order->orderproducts as $product)
                <div class="col-md-12 cart-product">
                    <div class="cart-product-image">
                        <a href="{{ route('show', ['slug' => $product->product->slug]) }}"><img src="{{ asset('images/uploads/products/product_').$product->product->id.'/img_'.$product->product->main_image_url.'.png' }}" class="product-img-small"></a>
                    </div>
                    <div class="cart-product-info">
                        <p>{{ $product->product->title }}</p>
                    </div>
                    <div class="cart-product-price">
                        <p>{{ $product->quantity }}</p>
                        <p>€{{ $product->product->price }}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')