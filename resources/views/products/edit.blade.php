@include('layouts.header')

<script type="text/javascript" src="{{ URL::asset('js/croppie.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/croppie.css') }}" />
<script type="text/javascript" src="{{ URL::asset('js/product-image-upload.js') }}"></script>

<style>
.admin-top {
    height: 38px;
}
.product-images img{
    display: inline-block;
    margin-left: 15px;
    height: 125px;
    width: 125px;
} 
.product-images img:hover{
    cursor: pointer;
}  
.main-image-radio input{
    margin-left: 127px;
}   
.product-images{
    margin-top: 38px;
} 
.first-el{
    margin: 0 !important;
}
h5{
    color: #2570e8;
}
.delete-image{
	position: absolute;
	height: 25px !important;
	width: 25px !important;
}
</style>
<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2 products-add">
        @include('layouts.admin-submenu')
            <div class="admin-top">
                <h3>Edit Product</h3>
            </div>
            <hr>
            <form id="product-add-form" class="form-horizontal" role="form" method="POST" action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Info</h5>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                    <h5>Images</h5>
                        <div class="product-images" id="product-images">
                        <input type="hidden" id="image-count" value="{{ count($product->images) }}">
                            @foreach($product->images as $key=>$image)
                        		<input type="hidden" id="product-image-{{ $loop->iteration }}" name="product-image-{{ $loop->iteration }}" value="added">
                        		<img class="delete-image {{ $loop->iteration == 1 ? 'first-el' : '' }}" id="delete-image-{{ $loop->iteration }}" src="{{asset('images/trash_icon.png')}}">
                        		<img id='image-{{ $loop->iteration }}' data-toggle='modal' data-target='#myModal' {{ $loop->iteration == 1 ? 'class=first-el' : '' }} src="{{asset('images/uploads/products/product_').$product->id.'/'.$image->image_url.'.png'}}">
                            @endforeach
                            @for ($i =count($product->images)+1; $i <= 4; $i++)
                            	<input type="hidden" id="product-image-{{ $i }}" name="product-image-{{ $i }}" value="added">
                            	<img class="delete-image {{ $i == 1 ? 'first-el' : '' }}" id="delete-image-{{ $i }}" src="{{asset('images/trash_icon.png')}}">
                            	<img id='image-{{ $i }}' {{ $i == 1 ? 'class=first-el' : '' }} data-toggle='modal' data-target='#myModal' src="https://via.placeholder.com/125x125">
                            @endfor
                        </div>
                        <div class="main-image-radio">
	                        @for ($i =1; $i <= 4; $i++)
	                        	<input {{ $i == 1 ? 'class=first-el' : '' }} type="radio" value="product-image-{{ $i }}" name="main-image" {{ $product->main_image_url == $i ? 'checked' : '' }}>
	                        @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="release_date">Description</label>
                            <textarea class="form-control" name="description">{{ $product->productable->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label><br>
                            <select id="category" name="category" class="form-control">
                            @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div id="music-product">
                            <div class="form-group">
                                <label for="release_date">Release date</label>
                                <input type="date" class="form-control" name="release_date" value="{{ $product->productable->release_date }}">
                            </div>
                            <div class="form-group">
                                <label for="artist">Artist</label>
                                <input type="text" class="form-control" name="artist" value="{{ $product->productable->artist }}">
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" class="form-control" name="genre" value="{{ $product->productable->genre }}">
                            </div>
                            <div class="form-group">
                                <label for="carrier">Carrier</label><br>
                                <select name="carrier" class="form-control">
                                @foreach($carriers as $carrier)
                                  <option value="{{ $carrier->id }}">{{ $carrier->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <a href="javascript:{}" onclick="document.getElementById('product-add-form').submit(); return false;" class="btn btn-primary btn-lg btn-block" style="color: white">Save</a>
                    </div>
                </div>
            </form>
        </div>         
    </div>
</div>
<style>
.dropzone{
    height: 400px;
}
.dropzone input{
    display: block;
    margin: auto;
    padding-top: 167px;
}
#vanilla-demo{
    height: 500px;
}
.vanilla-result{
	margin: auto;
    display: block;
    margin-bottom: 12px;
}
</style>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="upload-member">
        <div id="resp"></div>
        <div id="dropzone" class="dropzone">
            <input type="file" class="upload-file" value="Choose a file" onchange="readURL(event); ">
        </div>
        <div id="vanilla-demo"></div>
        <input class="vanilla-result btn" id="submit" type="button" value="Submit">
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
$("#product-images").on("click", "img", function (event) {
    var el = document.getElementsByClassName("upload-file")[0];
    el.id = event.target.id;
    $("#dropzone").show();
    $("#vanilla-demo").empty();
    $("#vanilla-demo").hide();
    $(".upload-file").val("");
});

$(document).on("click", ".delete-image", function (event) {
	var id = event.target.id;
    var last = id.substr(id.length - 1);
    var id = parseInt(last);
    var img_value = document.getElementById("image-count").value;
    var img_count = parseInt(img_value);
    console.log(img_count);
    console.log(id);

    var value = document.getElementById('product-image-'+last).value;
    if(img_count >= id){
    	$("#product-image-"+last).val("delete");
    }
    else if(value.length > 100){
    	$("#product-image-"+last).val("added");
    }
    $("#image-"+last).attr("src", "https://via.placeholder.com/125x125");
});

// var val = $('#category').val()

// console.log(val);


</script>
@include('layouts.footer')