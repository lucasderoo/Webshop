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
                        <p>{{ $user->member->firstname }}</p>
                    </div>
                    <div class="form-input">
                        <label for="insertion" class="control-label">Insertion</label>
                        <p>{{ $user->member->insertion }}</p>
                    </div>
                    <div class="form-input">
                        <label for="lastname" class="control-label">Last name</label>
                        <p>{{ $user->member->lastname }}</p>
                    </div>
                    <div class="form-input">
                        <label for="initials" class="control-label">Initials</label>
                        <p>{{ $user->member->lastname }}</p>
                    </div>
                    <div class="form-input">
                        <label for="phonenumber" class="control-label">Phone Number</label>
                        <p>{{ $user->member->phonenumber }}</p>
                    </div>
                    <div class="form-input">
                        <label for="email" class="control-label">E-Mail Address</label>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="form-input">
                        <label for="user_account_type" class="control-label">Account type</label>
                        <p>@if($user->user_account_type == 1) Customer @elseif($user->user_account_type == 2) Manager @else Admin @endif</p>
                    </div>
                    <div class="form-input">
                        <label for="user_activated" class="control-label">User activated</label>
                        <p>@if($user->user_activated == 1) Yes @else No @endif</p>
                    </div>
                    <br>
                    <div class="form-input">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')