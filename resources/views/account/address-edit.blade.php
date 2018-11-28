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
</style>
<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2 products-index">
            <div class="admin-top">
                <h3>Update Address</h3>
            </div>
            <hr>
            <div class="row">
                <style>
                .account-menu{
                    padding: 0;
                }

                .account-menu li{
                    list-style-type: none;
                }
                .account-menu a{
                    text-decoration: none;
                    color: black;
                }
                .account-menu a:hover{
                    text-decoration: underline;
                }
                .selected-account-info{
                    text-decoration: underline !important;
                    color: #2570e8 !important;
                }
                </style>
                <div class="col-md-2">
                    <ul class="account-menu">
                        <li>- <a href="{{ route('account') }}">Account info</a></li> 
                        <li>- <a href="{{ route('account/orders') }}">My Orders</a></li>
                        <li>- <a href="{{ route('account/addresses') }}" class="selected-account-info">My Addresses</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <form class="form-horizontal" method="POST" action="">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="street" class="form-control" name="street" value="{{ $address->street }}" required>
                            @if ($errors->has('street'))
                            <span class="help-block">
                                <strong>{{ $errors->first('street') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="house_number">House number</label>
                            <input type="number" class="form-control" name="house_number" value="{{ $address->house_number }}"required>
                            @if ($errors->has('house_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('house_number') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="suffix">Suffix</label>
                            <input type="text" class="form-control" name="suffix" value="{{ $address->suffix }}">
                            @if ($errors->has('suffix'))
                            <span class="help-block">
                                <strong>{{ $errors->first('suffix') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" class="form-control" name="zipcode" value="{{ $address->zipcode }}" required>
                            @if ($errors->has('zipcode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('zipcode') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" value="{{ $address->city }}" required>
                            @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" value="{{ $address->country }}" required>
                            @if ($errors->has('country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                            @endif
                        </div>
                        <br>
                        <div class="form-input">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')