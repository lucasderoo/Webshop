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
        <div class="col-md-6 login-form">
            <div class="panel-header form-header">
                <h5>Sign In</h5>
            </div>
            <div class="panel-body form-control">
                <form class="form-horizontal" method="POST" action="">
                {{ csrf_field() }}
                    <div class="form-input">
                        <label for="email" class="control-label">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-input">
                        <label for="email" class="control-label">Password</label>
                        <input id="email" type="password" class="form-control" name="password" required>
                        <a href="#" class="a-link">Forgot password?</a>
                    </div>
                    <div class="form-input">
                        <div class="checkbox">
                            <input id="login-remember" value="1" name="remember" type="checkbox">
                            <label for="remember" class="control-label">Remember me</label>
                        </div>
                    </div>
                    <div class="form-input">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <hr>
                <p>Don't have an account? <a href="#">Sign Up Here</a></p>
            </div>
        </div>
    </div>
</div>
    
@include('layouts.footer')