@include('layouts.header')

<style>
.product-info p{
width: 100%;
display: inline-block;
height: 25px;
}
.image-select{
	width: 20%;
	height: 500px;
	float: left;
}
.image-select img{
	display: block;
	margin-bottom: 15px;
	max-width: 100px;
	max-height: 100px;
}
.main-image-buy-btn{
	width: 74%;
	height: 500px;
	float: left;
}
.main-image img{
	display: block;
	margin: auto;
}
.buy-buttons{
	margin-top: 40px;
}
.buy-buttons button{
	color: white;
	width: 40%;
	height: 50px;
}
.add-to-cart{
	float: left;
	background-color: #00ACED;
}
.buy-now{
	float: right;
	background-color: #FF9900;
}
.main-image-buy-btn-wrapper{
	width: 85%;
    margin: auto;
}
.top-row{
	margin-top: 10px;
	height: 50px;
}
.Big_image{
width: 400px;
height: 400px;

}
.normal_sized_p{
font-size: 18px

}
.x100_pic{
	width: 75px;
    border: 2px solid grey;
    cursor: pointer;
}

b{
font-size: 20px;
}
hr{
 border-color:black;
}
h5{
	color: #00ACED;
}
.bottom-p{
	width: 100% !important;
}

.product-desc textarea{
    resize: none;
    border: none;
    height: 100%;
    width: 100%;
    padding: 0;
    outline: none;
}
.selected-image{
    border: 2px solid #00ACED !important;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        @include('layouts.feedback')
            <div class="row top-row">
                <div class="col-md-8">
                	<p>Home > {{$product->category->name}} > {{$product->productable->artist}} - {{$product->title}}</p>
                </div>
                <div class="col-md-4">
                	<h5>{{$product->productable->artist}} - {{$product->title}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                	<div class="image-select">
                    <img id="img-1" class="x100_pic selected-image" src="{{asset('images/uploads/products/product_').$product->id.'/img_'.$product->main_image_url.'.png'}}">
                    @foreach($product->images as $image)
                        @if($product->main_image_url != (int)substr($image->image_url, -1))
                            <img id="img-{{$loop->iteration+1}}" class="x100_pic " src="{{asset('images/uploads/products/product_').$product->id.'/'.$image->image_url.'.png'}}">
                        @endif
                    @endforeach
                	</div>
                	<div class="main-image-buy-btn">
                		<div class="main-image-buy-btn-wrapper">
                			<img id="big_image" class="Big_image" src="{{asset('images/uploads/products/product_').$product->id.'/img_'.$product->main_image_url.'.png'}}">
                			<div class="buy-buttons">
                                <form role="form" method="POST" action="{{ route('cart/create', ['slug' => $product->slug]) }}">
                                    {{ csrf_field() }}
                				    <button class="add-to-cart btn" type="submit">Add to Cart</button>
                                </form>
                				<button class="buy-now btn">Buy Now</button>
                			</div>
                		</div>
                	</div>
                </div>
                <div class="col-md-4">
        			<b> €{{$product->price}}</b>
        			<hr>
                	<h5>Product description</h5>
                	<div class="product-info">
                	<p><b>Artist:</b> {{$product->productable->artist}}</p>
                	<p><b>Title:</b> {{$product->title}}</p>
                	<p><b>Format:</b> {{$product->productable->carrier->name}}</p>
                	<p><b>Genre:</b> {{$product->productable->genre}}</p>
                    <p><b>Stock:</b> {{$product->stock->amount}}</p>
                	<p class="bottom-p"><b>Released:</b> {{$product->productable->release_date}}</p>
                	</div>

                	<div class="product-desc" style="height: 300px;">
                	<br>
                		<textarea readonly="readonly">{{$product->productable->description}}</textarea>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(".image-select").on("click", "img", function (event) {
    $('.image-select').children().each(function(){
        $(this).removeClass("selected-image");
    });
    $("#"+event.target.id).addClass("selected-image");

    $("#big_image").attr('src', $("#"+event.target.id).attr('src'));
});

</script>
@include('layouts.footer')