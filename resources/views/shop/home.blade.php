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
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="images/bg-banner-metallica.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/bg-banner-metallica.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/bg-banner-metallica.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <br>
      <div class="card-deck justify-content-center" >
        <div class="card" style="width:100%">
          {{-- <a href="{{route('products')}}"> --}}
            <img class="card-img-top" src="images/banner-nieuwste-albums.png"/ alt="Card image cap">
          {{-- </a> --}}
        </div>
        <div class="card" style="width: 100%">
          {{-- <a href="{{route('customer_service')}}" --}}
            <img class="card-img-top" src="images/banner-contact.png"/ alt="Card image cap">
          {{-- </a> --}}
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
                          <img src="{{asset('images/uploads/products/product_').$product->product->id.'/img_'.$product->product->main_image_url.'.png'}}">
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
        <a href="https://www.youtube.com/watch?v=YT516h7QwA4">
          <img class="card-img-top" src="images/banner-aanrader.png" alt="Card image cap">
        </a>
      </div>
      <div class="card" style="width: 100%">
        <img class="card-img-top" src="images/banner-info-album.png"/ alt="Card image cap">
      </div>
    </div>
    {{-- <div class="row justify-content-center">
      <div class ="two-small-banners col-12 offset-md-2">
        <div class="row">
          <div class="col-md-4" style=" margin-right: 25px;">
            <a href="https://www.youtube.com/watch?v=YT516h7QwA4">
              <img src="images/banner-aanrader.png"/>
            </a>
          </div>
          <div class="col-md-4"  style="margin-left: 25px;">
            <a href="/product/ride-the-lightning">
              <img src="images/banner-info-album.png"/>
            </a>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="row">
      <!-- <div class="container" style="margin-top:40px; background-color:#deecee;">
          <h5> Niet jouw smaak? </h5> <h6>Kies hier je genre dan maar!</h6>
            <div class="row justify-content-center">
                <div class="col finished">
                    <div class="prod-image">
                        <a href="/products?genres[]=Jazz">
                        <img src="images/Jazz-icon.jpg">
                        </a>
                    </div>
              </div>
              <div class="col finished">
                  <div class="prod-image">
                    <a href="/products?genres[]=Rock">
                    <img src="images/rock-icon.jpg">
                    </a>
                  </div>
              </div>
              <div class="col finished">
                  <div class="prod-image">
                    <a href="/products?genres[]=Classical">
                      <img src="images/classic-icon.jpg">
                    </a>
                  </div>
              </div>
              <div class="col finished">
                  <div class="prod-image">
                    <a href="/products?genres[]=Metal">
                      <img src="images/metal-icon.jpg">
                    </a>
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">
            <div class="button">
              <h6>test</h6>
            </div>
          </div>
      </div>

    </div> -->
    </div>

  </div>

</div>

@include('layouts.footer')
