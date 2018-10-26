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
        @include('layouts.admin-submenu')
            <div class="admin-top">
                <h3>Users</h3>
                <a class="btn btn-small btn-success" href="{{ URL::to('admin/users/create') }}">Create</a>
            </div>
            <hr>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>Email</td>
                        <td>Firstname</td>
                        <td>Lastname</td>
                        <td>Account type</td>
                        <td>created At</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        <td>Show</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->member->firstname }}</td>
                        <td>{{ $user->member->insertion }} {{ $user->member->lastname }}</td>
                        <td>@if($user->user_account_type == 1) Customer @elseif($user->user_account_type == 2) Manager @else Admin @endif</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a class="btn btn-small btn-info" href="{{ route('admin/users/edit', ['id' => $user->id]) }}">Edit</a></td>
                        <td><a class="btn btn-small btn-danger" href="{{ route('admin/users/delete', ['id' => $user->id]) }}">Delete</a></td>
                        <td><a class="btn btn-small btn-warning" href="{{ route('admin/users/read', ['id' => $user->id]) }}">Show</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('layouts.footer')