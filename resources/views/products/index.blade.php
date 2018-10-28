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
                <h3>Products</h3>
                <a class="btn btn-small btn-success" href="{{ URL::to('admin/products/create') }}">Create</a>
            </div>
            <hr>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Slug</td>
                        <td>Price</td>
                        <td>Category</td>
                        <td>Created At</td>
                        <td>Updated At</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        <td>Show</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td><a class="btn btn-small btn-info" href="{{ route('admin/products/edit', ['id' => $product->id]) }}">Edit</a></td>
                        <td><a class="btn btn-small btn-danger" href="{{ route('admin/products/delete', ['id' => $product->id]) }}">Delete</a></td>
                        <td><a class="btn btn-small btn-warning" href="{{ route('show', ['slug' => $product->slug]) }}">Show</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('layouts.footer')