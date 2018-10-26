@include('layouts.header')

<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @include('layouts.admin-submenu')
            <div class="admin-top">
                <h3>Add User</h3>
            </div>
            <hr>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="">
                {{ csrf_field() }}
                    <div class="form-input">
                        <label for="firstname" class="control-label">First name</label>
                        <input id="first_name" type="text" class="form-control" name="firstname" required>
                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="insertion" class="control-label">Insertion</label>
                        <input id="insetion" type="text" class="form-control" name="insertion">
                        @if ($errors->has('insertion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('insertion') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="lastname" class="control-label">Last name</label>
                        <input id="last_name" type="text" class="form-control" name="lastname" required>
                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="initials" class="control-label">Initials</label>
                        <input id="initials" type="text" class="form-control" name="initials" required>
                        @if ($errors->has('initials'))
                            <span class="help-block">
                                <strong>{{ $errors->first('initials') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="phonenumber" class="control-label">Phone Number</label>
                        <input id="phone_number" type="text" class="form-control" name="phonenumber">
                        @if ($errors->has('phonenumber'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phonenumber') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="email" class="control-label">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="email" class="control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="password_confirmation" class="control-label">Password Confirmation</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="user_account_type" class="control-label">Account type</label>
                        <select name="user_account_type" class="form-control">
                            <option value="1">Customer</option>
                            <option value="2">Manager</option>
                            <option value="3">Admin</option>
                        </select>
                        @if ($errors->has('user_account_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_account_type') }}</strong>
                            </span>
                        @endif
                    </div>
                    <br>
                    <div class="form-input">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')