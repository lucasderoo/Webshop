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
	margin-top: 80px;
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
max-width: 600px;
max-height: 700px;

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
<div class="container-fluid main-container" style="max-width: 1000px; margin: auto; margin-top: 100px;">
    <div class="row top-row">
        <div class="col-md-8">
        	<p>Home > {{$product->productable->carrier->name}} > {{$product->productable->artist->name}} - {{$product->title}}</p>
        </div>
        <div class="col-md-4">
        	<h5>{{$product->productable->artist->name}} - {{$product->title}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
        	<div class="image-select">
        		<img src="https://via.placeholder.com/80x60">
        		<img src="https://via.placeholder.com/80x60">
        		<img src="https://via.placeholder.com/80x60">
        		<img src="https://via.placeholder.com/80x60">
        	</div>
        	<div class="main-image-buy-btn">
        		<div class="main-image-buy-btn-wrapper">
        			<img src="https://via.placeholder.com/400x300">
        			<div class="buy-buttons">
        				<button class="add-to-cart btn">Add to Cart</button>
        				<button class="buy-now btn">Buy Now</button>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="col-md-4">
        	<h5>Product description</h5>
        	<div class="product-info">
        	<p>Artist: {{$product->productable->artist->name}}</p>
        	<p>Title: {{$product->title}}</p>
        	<p>Format: {{$product->productable->carrier->name}}</p>
        	<p>Genre: {{$product->productable->genre->name}}</p>
        	<p class="bottom-p">Released: {{$product->productable->release_date}}</p>
        	</div>

        	<div class="product-desc">
        	<br>
        		<p>{{$product->productable->description}}<p>
        	</div>
        </div>
    </div>
</div>
