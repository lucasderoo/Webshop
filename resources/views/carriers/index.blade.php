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
                <h3>Carriers</h3>
                <a class="btn btn-small btn-success" href="{{ URL::to('admin/carriers/create') }}">Create</a>
            </div>
            <hr>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        <td>Show</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($carriers as $carrier)
                    <tr>
                        <td>{{ $carrier->id }}</td>
                        <td>{{ $carrier->name }}</td>
                        <td><a class="btn btn-small btn-info" href="{{ route('admin/carriers/edit', ['id' => $carrier->id]) }}">Edit</a></td>
                        <td><a class="btn btn-small btn-danger" href="{{ route('admin/carriers/delete', ['id' => $carrier->id]) }}">Delete</a></td>
                        <td><a class="btn btn-small btn-warning" href="{{ route('admin/carriers/read', ['id' => $carrier->id]) }}">Show</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('layouts.footer')