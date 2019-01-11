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
              <div class="col-md-12" style="height:80; margin-bottom: 80px; margin-top: 80px; ">
                <div class="row justify-content-center">
                        <span class="display-3 d-block">You are not logged in.</span>
                      </div>
              </div>
              <div class="col-md-12 lead text-center" style="margin-bottom:80px;">
                <div class="row justify-content-center">
                  Would you like to log in?
                </div>
              </div>
              <div class="col-md-12">
                <div class="row justify-content-center">
                  <div class="col-3">
                    <a class="btn btn-primary" href="{{ route('login') }}" role="button" style="margin-top:10px; width: 160px; height: 100%;">Go to login</a>
                  </div>
                  <div class="col-3">
                    <a class="btn btn-primary " href="{{ route('checkout') }}" role="button" style="margin-top:10px; width: 160px; height: 100%;">Continue as guest</a>
                  </div>
                </div>
              </div>
            @endif
            </div>
        </div>
    </div>
</div>
