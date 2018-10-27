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
                <h3>Account Info</h3>
                <a class="btn btn-warning" href="{{ URL::to('account/password') }}">Edit Password</a>
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
                        <li>- <a class="selected-account-info" href="{{ route('account') }}">Account info</a></li>
                        <li>- <a href="{{ route('account/orders') }}">My Orders</a></li>
                        <li>- <a href="{{ route('account/addresses') }}">My Addresses</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <form class="form-horizontal" method="POST" action="">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" name="firstname" value="{{ $user->member->firstname }}" required>
                            @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="insertion">Insertion</label>
                            <input type="text" class="form-control" name="insertion" value="{{ $user->member->insertion }}">
                            @if ($errors->has('insertion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('insertion') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" name="lastname" value="{{ $user->member->lastname }}" required>
                            @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="initials">Initials</label>
                            <input type="text" class="form-control" name="initials" value="{{ $user->member->initials }}" required>
                            @if ($errors->has('initials'))
                            <span class="help-block">
                                <strong>{{ $errors->first('initials') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Phonenumber</label>
                            <input type="text" class="form-control" name="phonenumber" value="{{ $user->member->phonenumber }}">
                            @if ($errors->has('phonenumber'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phonenumber') }}</strong>
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