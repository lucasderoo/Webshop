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
                <h3>Edit Category</h3>
            </div>
            <hr>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="">
                {{ csrf_field() }}
                    <div class="form-input">
                        <label for="title" class="control-label">Title</label>
                        <input id="title" type="text" class="form-control" name="title" value="{{ $homePage->title }}"required>
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <br>
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
                                    <td>Select</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->category->name }}</td>
                                        <td><input id="products" type="checkbox" class="form-control" name="products[]" value="{{ $product->id }}" @if($homePage->products->contains('product_id', $product->id))) checked @endif></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="form-input">
                        <label for="displayed" class="control-label">Displayed</label>
                        <input id="displayed" type="checkbox" name="displayed" value="2" @if($homePage->displayed == 2) checked @endif>
                        @if ($errors->has('displayed'))
                            <span class="help-block">
                                <strong>{{ $errors->first('displayed') }}</strong>
                            </span>
                        @endif
                    </div>
                    <br>
                    <div class="form-input">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')