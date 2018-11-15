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
        <div class ="main-story col-12">
        </div><!--main-story-->
      </div>
      <div class="row">
        <div class ="two-small-banners col-12 offset-md-2">
          <div class="row">
            <div class="col-md-4" style="margin-right: 25px;">
                <a href="/products">
                <img src="images/banner-nieuwste-albums.png" height="110" width="325"/>
                </a>
            </div>
            <div class="col-md-4"  style="margin-left: 25px;">
                <a href="/contact">
                  <img src="images/banner-contact.png"/>
                </a>

            </div>
          </div>
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
    <div class="row">
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
    </div>
    <div class="row">
      <div class="container" style="margin-top:40px; background-color:#deecee;">
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

    </div>
    <div class="row">
      <div class="container" style="background-color:#deecee; margin-top:40px; text-align:center;">
          <h5> Is dit misschien iets voor jou? Voor de aankomende vakanties en seizoenen!</h5>
            <div class="row justify-content-center">
                <div class="col finished">
                    <div class="prod-image">
                        <a href="/product/nightmare-before-christmas-ost">
                        <img src="images/NMBC_front.jpg">
                    </div>
                    <div class="text-image-1">
                      <h6> Diversen: Nightmare Before Christmas
                        <br>
                        Price: €10.99
                      </h6>
                    </div>
                        </a>
              </div>
              <div class="col finished">
                  <div class="prod-image">
                    <a href="/product/merry-christmas-ii-you">
                    <img src="images/Mariah_C_Christmas_Front.jpg">
                  </div>
                  <div class="text-image-2">
                      <h6> Mariah Carry: Merry Christmas II You
                      <br>
                      Price: €17.99
                      </h6>
                  </div>
                </a>
              </div>
              <div class="col finished">
                  <div class="prod-image">
                    <a href="/product/now-that-s-what-i-call-christmas">
                  <img src="images/NTWICChristmas.jpg">
                  </div>
                  <div class="text-image-3">
                      <h6> Diversen: Now That's What I Call Christmas
                      <br>
                      Price: €13.99
                      </h6>
                  </div>
                </a>
              </div>
              <div class="col finished">
                  <div class="prod-image">
                    <a href="/product/monster-halloween-hits">
                      <img src="images/Halloween_hits_front.jpg">
                  </div>
                  <div class="text-image-4">
                      <h6> Diversen: Monster Halloween Hits
                      <br>
                      Price: €6.66
                      </h6>
                  </div>
                </a>
              </div>
          </div>
      </div>

    </div>

  </div>

</div>

@include('layouts.footer')
