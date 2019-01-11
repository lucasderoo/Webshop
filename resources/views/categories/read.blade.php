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
                <h3>Show Category</h3>
            </div>
            <hr>
            <div class="panel-body">
                <div class="form-input">
                    <label for="name" class="control-label">Name</label>
                    <p>{{ $category->name }}</p>
                </div>
                <h3>Products</h3>
                <hr>
                <div class="form-input">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Price</td>
                                <td>Category</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($category->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')