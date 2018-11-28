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
        @include('layouts.feedback')
        @include('layouts.admin-submenu')
            <div class="admin-top">
                <h3>HomePage (sections)</h3>
                <a class="btn btn-small btn-success" href="{{ URL::to('admin/homepage/create') }}">Create</a>
            </div>
            <hr>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        <td>Products</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td><a class="btn btn-small btn-info" href="{{ route('admin/homepage/edit', ['id' => $page->id]) }}">Edit</a></td>
                        <td><a class="btn btn-small btn-danger" href="{{ route('admin/homepage/delete', ['id' => $page->id]) }}">Delete</a></td>
                        <td>{{ count($page->products) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('layouts.footer')