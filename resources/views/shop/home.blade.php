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
      <div class="row justify-content-center">
        <div class ="two-small-banners col-12 offset-md">
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
      <div class="row">
        <div class="container" style="background-color:#deecee; margin-top:40px; text-align:center;">
            <h4> Onze favorieten!</h4>
              <div class="row justify-content-center">
                  <div class="col finished">
                      <div class="prod-image">
                          <a href="/product/queen-ii">
                          <img src="images/Queen-II-Front.jpg">
                      </div>
                      <div class="text-image-1">
                        <h6> Queen II: LP
                          <br>
                          Price: €99.99
                        </h6>
                      </div>
                          </a>
                </div>
                <div class="col finished">
                    <div class="prod-image">
                      <a href="/product/ride-the-lightning">
                      <img src="images/Metallica_Ride_the_Lightning_front.jpg">
                    </div>
                    <div class="text-image-2">
                        <h6> Metallica: Ride the lightning
                        <br>
                        Price: €14.99
                        </h6>
                    </div>
                  </a>
                </div>
                <div class="col finished">
                    <div class="prod-image">
                      <a href="/product/queen">
                    <img src="images/Nicky_M_Queen_Front.jpg">
                    </div>
                    <div class="text-image-3">
                        <h6> Nicki Minaj: Queen
                        <br>
                        Price: €19.99
                        </h6>
                    </div>
                  </a>
                </div>
                <div class="col finished">
                    <div class="prod-image">
                      <a href="/product/kamikaze">
                        <img src="images/Kamikaze_Eminem_Front.jpg">
                    </div>
                    <div class="text-image-4">
                        <h6> Eminem: Kamikaze
                        <br>
                        Price: €16.99
                        </h6>
                    </div>
                  </a>
                </div>
            </div>
        </div>

      </div>
      <br>
    <div class="row justify-content-center">
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
