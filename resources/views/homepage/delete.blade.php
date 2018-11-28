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
                <h3>Delete section</h3>
            </div>
            <hr>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="">
                {{ csrf_field() }}
                    <div class="form-input">
                        <label for="name" class="control-label">Title</label>
                        <p>{{ $homePage->title }}</p>
                    </div>
                    <br>
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
                            @foreach($homePage->products as $product)
                                <tr>
                                    <td>{{ $product->product->id }}</td>
                                    <td>{{ $product->product->title }}</td>
                                    <td>{{ $product->product->price }}</td>
                                    <td>{{ $product->product->category->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-input">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')