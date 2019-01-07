@include('layouts.header')

<style>

.admin-top a{
    display: inline-block;
    float: right;
}
.admin-top h3{
    display: inline-block;
}


</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="admin-top">
                <h3>Edit password</h3>
            </div>
            <hr>
            <div class="row">
                @include('layouts.account-submenu')
                <div class="panel-body col-md-10">
                    <form class="form-horizontal" method="POST" action="">
                    {{ csrf_field() }}
                        <div class="form-input">
                            <label for="email" class="control-label">Current Password</label>
                            <input id="current_password" type="password" class="form-control" name="current_password" required>
                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-input">
                            <label for="email" class="control-label">New Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <small><b>The password must contain at least 6 characters. </b></small>
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
