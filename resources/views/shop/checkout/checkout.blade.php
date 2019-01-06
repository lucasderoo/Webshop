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
            @if(Auth::guest())
                <div class="row">
                    <div class="col-md-12">
                    <h2>Order info</h2>
                    <hr>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="text" class="form-control" name="email" @if(session('order'))session('order')['email']@endif>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">Firstname</label>
                            <input type="text" class="form-control" name="firstname"  @if(session('order'))session('order')['firstname']@endif>
                            @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">Lastname</label>
                            <input type="text" class="form-control" name="lastname"  @if(session('order'))session('order')['lastname']@endif>
                            @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">  
                        <h2 style="margin-bottom: 17px;">Delivery address</h2>
                        <br>
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="street" class="form-control" name="street" required>
                            @if ($errors->has('street'))
                            <span class="help-block">
                                <strong>{{ $errors->first('street') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="house_number">House number</label>
                            <input type="number" class="form-control" name="house_number" required>
                            @if ($errors->has('house_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('house_number') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="suffix">Suffix</label>
                            <input type="text" class="form-control" name="suffix">
                            @if ($errors->has('suffix'))
                            <span class="help-block">
                                <strong>{{ $errors->first('suffix') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" class="form-control" name="zipcode" required>
                            @if ($errors->has('zipcode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('zipcode') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" required>
                            @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" required>
                            @if ($errors->has('country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Billing address</h2>
                        <input type="checkbox" name="billing_address" onchange="show_billing()" checked>
                        <label for="billing_address">Same as delivery address</label>
                        <div id="billing-address-form" style="display:none">
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="street" class="form-control" name="street_billing">
                                @if ($errors->has('street_billing'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('street_billing') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="house_number">House number</label>
                                <input type="number" class="form-control" name="house_number_billing">
                                @if ($errors->has('house_number_billing'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('house_number_billing') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="suffix">Suffix</label>
                                <input type="text" class="form-control" name="suffix_billing">
                                @if ($errors->has('suffix_billing'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('suffix_billing') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="zipcode">Zipcode</label>
                                <input type="text" class="form-control" name="zipcode_billing">
                                @if ($errors->has('zipcode_billing'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('zipcode_billing') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city_billing">
                                @if ($errors->has('city_billing'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city_billing') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" name="country_billing">
                                @if ($errors->has('country_billing'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country_billing') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <h2>Delivery address</h2>
                <hr>
                <div class="row">
                    @if($user->addresses->isEmpty())
                        <div class="col-md-12 address-div">
                            <p>No Addresses found. <a href="{{ route('account/addresses/create') }}">Click here</a> to add a address</p>
                        </div>
                    @else
                        @foreach($user->addresses as $address)
                        <div class="col-md-3 address-div">
                            <p>{{ $address->street }} {{ $address->house_number }}{{ $address->suffix }}</p>
                            <p>{{ $address->city }}</p>
                            <p>{{ $address->zipcode }}</p>
                            <p>{{ $address->country }}</p> 
                        <input name="delivery_input[]" class="delivery-input" type="checkbox" value="{{ $address->id }}" checked>
                        <span class="form-check-label font-weight-bold">Deliver here</span>  
                    </div>
                    @endforeach
                </div>
                <br>
                @if(!$user->addresses->isEmpty())
                <h2>Billing address</h2>
                <input type="checkbox" name="billing_address" onchange="show_billing()" checked>
                <label for="billing_address">Same as delivery address</label>
                <hr>
                <div class="row" id="billing-address-form" style="display:none">
                    @foreach($user->addresses as $address)
                    <div class="col-md-3 address-div">
                        <p>{{ $address->street }} {{ $address->house_number }}{{ $address->suffix }}</p>
                        <p>{{ $address->city }}</p>
                        <p>{{ $address->zipcode }}</p>
                        <p>{{ $address->country }}</p> 

                        <input name="billing_input[]" id="address-input" type="checkbox" value="{{ $address->id }}">
                        <span class="form-check-label font-weight-bold">Bill here</span>  
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <button style="float: right" type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
                </form>
            </div>
		<hr>
    </div>
</div>

<script>

function show_billing(){
    var x = document.getElementById("billing-address-form");
    if (x.style.display === "none") {
        if(x.className != "row"){
            x.style.display = "block";
        }
        else{
            x.style.display = "flex";
        }
    } else {
        x.style.display = "none";
    }
}
$("input[name='delivery_input[]'").change(function (event) {
    var checkboxes = document.getElementsByName("delivery_input[]");

    for (var i = checkboxes.length - 1; i >= 0; i--) {
        checkboxes[i].checked = false;
    }
    event.target.checked = true;
});

$("input[name='billing_input[]'").change(function (event) {
    var checkboxes = document.getElementsByName("billing_input[]");

    for (var i = checkboxes.length - 1; i >= 0; i--) {
        checkboxes[i].checked = false;
    }
    event.target.checked = true;
});
</script>

@include('layouts.footer')