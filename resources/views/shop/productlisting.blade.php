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
h5{
	color: #00ACED;
}
.bottom-p{
	width: 100% !important;
}
</style>
<div class="container-fluid main-container" style="max-width: 1000px; margin: auto; margin-top: 100px;">
    <div class="row top-row">
    </div>
    <div class="row">
        <div class="col-md-8">
        </div>
    </div>
	@include('layouts.footer')
</div> 