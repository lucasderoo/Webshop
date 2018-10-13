@include('layouts.header')

<style>
.product-info p{
width: 49%;
display: inline-block;
height: 25px;
}
.image-select{
	width: 25%;
	height: 500px;
	float: left;
}
.image-select img{
	margin: auto;
	display: block;
	margin-bottom: 15px;
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
	width: 100%;
    margin: auto;
}
.top-row{
	margin-top: 10px;
	height: 50px;
}

.Big_image{
width: 600px;
height: 600px;

}
.normal_sized_p{
font-size: 18px

}
.x100_pic{
	max-width: 100px;
	max-height: 100px;

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


</style>
<div class="container-fluid main-container" style="max-width: 1300px; margin: auto; margin-top: 100px;">
    <div class="row top-row">
        <div class="col-md-8">
        	<p>Home > {{$product->category->name}} > {{$product->productable->artist->name}} - {{$product->title}}</p>
        </div>
        <div class="col-md-4">
        	<h5>{{$product->productable->artist->name}} - {{$product->title}}</h5>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-md-8">
        	<div class="image-select">

        		<img class="x100_pic" src="{{$product->main_image_url}}">
        		<!-- <img class="x100_pic"  src="https://img.cdandlp.com/2016/06/imgL/118209175-2.jpg" -->
        		<img class="x100_pic"  src="https://via.placeholder.com/100x100">
        		<img class="x100_pic"  src="https://via.placeholder.com/100x100">
        	</div>
        	<div class="main-image-buy-btn">
        		<div class="main-image-buy-btn-wrapper">
        		<!--	<img src="https://via.placeholder.com/600x700">
-->
							<img class="Big_image" src="{{$product->main_image_url}}">
        			<div class="buy-buttons">
        				<button class="add-to-cart btn">Add to Cart</button>
        				<button class="buy-now btn">Buy Now</button>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="col-md-4">
					<b> €{{$product->price}}</b>
					<hr>

<div class="product-info">
					<h5>Seller </h5><b>{{$product->productable->carrier->name}}</b>
</div>
					<hr>
        	<h5>Product description</h5>
        	<div class="product-info">
        	<p> <b>Artist:</b> {{$product->productable->artist->name}}</p>
        	<p><b>Title:</b> {{$product->title}}</p>
        	<p><b>Format:</b> {{$product->productable->format}}</p>
        	<p><b>Genre:</b> {{$product->productable->genre->name}}</p>
        	<p class="bottom-p"><b>Released:</b> {{$product->productable->release_date}}</p>
        	</div>

        	<div class="product-desc">

        		<p>{{$product->productable->description}}<p>
        	</div>
					<hr>
        </div>
    </div>
</div>
