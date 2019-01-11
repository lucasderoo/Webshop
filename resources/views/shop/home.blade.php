@include('layouts.header')

<style>
body{
  background-color: #f5f7f9 ;
  /* width: 960px; */
  margin: 0 auto;
}
.main-story {
  background-image: url("images/bg-banner-metallica.jpg"); 
  background-repeat: no-repeat;
  background-position: center;
  height: 570px;
}
.two-small-banners{
  text-align: center;
  height: 100px;
}
.blog-banner{
  text-align: left;
}
.prod-image img{
  margin: auto;
  display: block;
    margin-top: 15px;
  margin-bottom: 15px;
  width: 200px;
  height: 200px;
    /* background-color: lightblue: */
}
</style>

<div class ="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
    <div class="row">
      <div class="col-md-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{ asset('images/Kamikaze_Eminem_Front.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('images/Metallica_Ride_the_Lightning_front.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ ('images/Nicky_M_Queen_Front.jpg') }}" alt="Third slide">
            </div>
          </div> 
        </div>
      </div>
      <div class="col-md-6 bg">
      <a href="{{ route('products') }}">
      <img src="images/bannerallproducts.png" style="width:100%">
      </a> 
      </div>
      <br>
      <div class="card-deck justify-content-center" >
      </div>
    </div>
    @foreach($sections as $section)
    <div class="row">
      <div class="container" style="background-color:#deecee; margin-top:40px; text-align:center;">
          <h4>{{ $section->title }}</h4>
            <div class="row justify-content-center">
                @foreach($section->products as $product)
                <div class="col finished">
                    <div class="prod-image">
                        <a href="{{ route('show', [ 'slug' => $product->product->slug]) }}">
                        <img class="product-img" src="{{asset('images/uploads/products/product_').$product->product->id.'/img_'.$product->product->main_image_url.'.png'}}">
                    </div>
                    <div class="text-image-1">
                      <h6> {{ $product->product->title }}
                        <br>
                        Price: €{{ $product->product->price }}
                      </h6>
                    </div>
                        </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
  <br>
  @endforeach
  <div class="card-deck justify-content-center" >
    <div class="card" style="width:100%">
      <a href="{{ route('account') }}">
        <img class="card-img-top" src="images/banneraccount.png" alt="Card image cap">
      </a>
    </div>
    <div class="card" style="width: 100%">
      <a href="{{ route('customer_service') }}">
      <img class="card-img-top" src="images/bannercontact.png" alt="Card image cap">
      </a>
    </div>
  </div>
</div>
</div>
</div>
</div>

@include('layouts.footer')