@include('layouts.header')
<style>
.product-images img{
    display: inline-block;
    margin-left: 15px;
    height: 125px;
    width: 125px;
} 

</style>
<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2 products-delete">
        <div class="admin-top">
            <h3>Delete Product</h3>
            <hr>
        </div>
        	<form id="product-add-form" class="form-horizontal" role="form" method="POST" action="">
        	{{ csrf_field() }}
        		<div class="row">
                    <div class="col-md-4">
                        <h5>Info</h5>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <p>{{ $product->title }}</p>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <p>{{ $product->price }}</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <h5>Images</h5>
                        <div class="product-images" id="product-images">
                            @foreach($product->images as $key=>$image)
                        		<img data-toggle='modal' data-target='#myModal' {{ $loop->iteration == 1 ? 'class=first-el' : '' }} src="{{asset('images/uploads/products/product_').$product->id.'/'.$image->image_url.'.png'}}">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="release_date">Description</label>
                            <p>{{ $product->productable->description }}</p>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label><br>
                            <p>{{ $product->category->name }}</p>
                        </div>
                        <div id="music-product">
                            <div class="form-group">
                                <label for="release_date">Release date</label>
                                <p>{{ $product->productable->release_date }}</p>
                            </div>
                            <div class="form-group">
                                <label for="artist">Artist</label>
                                <p>{{ $product->productable->artist }}</p>
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <p>{{ $product->productable->genre }}</p>
                            </div>
                            <div class="form-group">
                                <label for="carrier">Carrier</label><br>
                                <p>{{ $product->productable->carrier->name }}</p>
                            </div>
                        </div>
                        <a href="javascript:{}" onclick="document.getElementById('product-add-form').submit(); return false;" class="btn btn-danger btn-lg btn-block" style="color: white">Delete</a>
                    </div>
                </div>
        	</form>
        </div>
    </div>
</div>

@include('layouts.footer')