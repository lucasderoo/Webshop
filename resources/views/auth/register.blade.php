@include('layouts.header')

<style>
.login-form{
    margin: auto;
}

.form-header{
    background-color: #3C83F7;
}

.form-header h5{
    margin: 0;
    padding: 5px;
    padding-left: 13px;
    color: white;
}

.panel-body{
    border-radius: 0;
}

.form-input{
    margin-bottom: 20px;
}
.form-input label{
    margin-bottom: 0;
}
.a-link{
    float: right;
    font-size: 1rem;
    text-decoration: none;
    color: #3C83F7;
}
.a-link:hover{
    text-decoration: underline;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="panel-header form-header">
                <h5>Register</h5>
            </div>
            <div class="panel-body form-control">
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
                        @else
                        <span class="help-block">
                            <strong>{{ $errors->first("")}}</strong>
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
                        <input id="email" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <small><b>The password must contain at least 6 characters. </b></small>
                    </div>
                    <div class="form-input">
                        <label for="password_confirmation" class="control-label">Password Confirmation</label>

                        <input id="email" type="password" class="form-control" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
                <hr>
                <p>Already have an account? <a href="#">Sign In Here</a></p>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
