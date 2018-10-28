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
        @include('layouts.feedback')
            @include('layouts.admin-submenu')
            <div class="admin-top">
                <h3>Edit User</h3>
                <a class="btn btn-warning" href="{{ route('admin/users/edit/password', ['id' => $user->id]) }}">Edit password</a>
            </div>
            <hr>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="">
                {{ csrf_field() }}
                    <div class="form-input">
                        <label for="firstname" class="control-label">First name</label>
                        <input id="first_name" type="text" class="form-control" name="firstname" value="{{ $user->member->firstname }}" required>
                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="insertion" class="control-label">Insertion</label>
                        <input id="insetion" type="text" class="form-control" name="insertion" value="{{ $user->member->insertion }}">
                        @if ($errors->has('insertion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('insertion') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="lastname" class="control-label">Last name</label>
                        <input id="last_name" type="text" class="form-control" name="lastname" value="{{ $user->member->lastname }}" required>
                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="initials" class="control-label">Initials</label>
                        <input id="initials" type="text" class="form-control" name="initials" value="{{ $user->member->initials }}" required>
                        @if ($errors->has('initials'))
                            <span class="help-block">
                                <strong>{{ $errors->first('initials') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="phonenumber" class="control-label">Phone Number</label>
                        <input id="phone_number" type="text" class="form-control" name="phonenumber" value="{{ $user->member->phonenumber }}">
                        @if ($errors->has('phonenumber'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phonenumber') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="email" class="control-label">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="user_account_type" class="control-label">Account type</label>
                        <select name="user_account_type" class="form-control">
                            <option value="1" {{ $user->user_account_type == 1 ? 'selected="selected"' : '' }}>Customer</option>
                            <option value="2" {{ $user->user_account_type == 2 ? 'selected="selected"' : '' }}>Manager</option>
                            <option value="3" {{ $user->user_account_type == 3 ? 'selected="selected"' : '' }}>Admin</option>
                        </select>
                        @if ($errors->has('user_account_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_account_type') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-input">
                        <label for="user_activated" class="control-label">User activated</label>
                        <select name="user_activated" class="form-control">
                            <option value="1" {{ $user->user_activated == 1 ? 'selected="selected"' : '' }}>Yes</option>
                            <option value="2" {{ $user->user_activated == 2 ? 'selected="selected"' : '' }}>No</option>
                        </select>
                        @if ($errors->has('user_activated'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_activated') }}</strong>
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
@include('layouts.footer')