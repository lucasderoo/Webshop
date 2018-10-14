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
            <div class="admin-top">
                <h3>Add Product</h3>
            </div>
            <hr>
            <form id="product-add-form" class="form-horizontal" role="form" method="POST" action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Info</h5>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="col-md-8">
                    <h5>Images</h5>
                        <div class="product-images" id="product-images">
                            <input type="hidden" id="product-image-1" name="product-image-1">
                            <input type="hidden" id="product-image-2" name="product-image-2">
                            <input type="hidden" id="product-image-3" name="product-image-3">
                            <input type="hidden" id="product-image-4" name="product-image-4">
                            <img class="delete-image first-el" id="delete-image-1" src="{{asset('images/trash_icon.png')}}">
                            <img id='image-1' data-toggle='modal' data-target='#myModal' class="first-el" src="https://via.placeholder.com/125x125">
                            <img class="delete-image" id="delete-image-2" src="{{asset('images/trash_icon.png')}}">
                            <img id='image-2' data-toggle='modal' data-target='#myModal' src="https://via.placeholder.com/125x125">
                            <img class="delete-image" id="delete-image-3" src="{{asset('images/trash_icon.png')}}">
                            <img id='image-3' data-toggle='modal' data-target='#myModal' src="https://via.placeholder.com/125x125">
                            <img class="delete-image" id="delete-image-4" src="{{asset('images/trash_icon.png')}}">
                            <img id='image-4' data-toggle='modal' data-target='#myModal' src="https://via.placeholder.com/125x125">
                        </div>
                        <div class="main-image-radio">
                            <input class="first-el" type="radio" value="product-image-1" name="main-image" checked>
                            <input type="radio" value="product-image-2" name="main-image">
                            <input type="radio" value="product-image-3" name="main-image">
                            <input type="radio" value="product-image-4" name="main-image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="release_date">Description</label>
                            <textarea class="form-control" name="description"></textarea>
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
                                <input type="date" class="form-control" name="release_date">
                            </div>
                            <div class="form-group">
                                <label for="artist">Artist</label>
                                <input type="text" class="form-control" name="artist">
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" class="form-control" name="genre">
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
        <div id="vanilla-demo" ></div>
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

    $("#product-image-"+id).val("");
    $("#image-"+id).attr("src", "https://via.placeholder.com/125x125");
});



</script>

@include('layouts.footer')