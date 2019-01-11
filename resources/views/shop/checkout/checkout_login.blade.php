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
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        @include('layouts.feedback')
            <div class="row">
            @if(Auth::guest())

            @endif
            </div>
        </div>
    </div>
</div>
