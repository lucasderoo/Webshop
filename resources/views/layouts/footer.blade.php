<style>
.headerlink {
  color:white;
  text-decoration:underline;
}

.headerlink:hover{
  color:#aaaaaa;
}
</style>

<!-- Footer -->
<footer class="page-footer font-small blue pt-4" style="margin-top: 100px; background-color:#494D4E; color:white;">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->

        <!-- Grid column -->

        <div class="col-md-4   mt-md-0 mt-4">

        <!-- Content -->
        <h5 class="text-uppercase">Social Media</h5>
        <ul class="list-unstyled">
          <li>
            <a href="http://www.facebook.com" class="headerlink">
              <i class="fab fa-facebook-square"></i> Check out our Facebook page!
            </a>
        </li>
        <li>
            <a href="http://www.twitter.com" class="headerlink">
              <i class="fab fa-twitter"></i> Check out our twitter page!
            </a>
        </li>
        <li>
          <a href="http://www.instagram.com" class="headerlink">
            <i class="fab fa-instagram"></i> Check out our instagram!
          </a>
        </li>
        </ul>

        </div

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-4 mb-md-0 mb-4">

            <!-- Links -->
            <h5 class="text-uppercase">Service</h5>

            <ul class="list-unstyled">
              <li>
                <a href="{{ route('faq') }}" class="headerlink">Frequently Asked Questions</a>
              </li>
              <li>
                <a href="{{ route('customer_service') }}" class="headerlink">Contact our customer service</a>
              </li>
              <li>
                <a href="{{ route('account') }}" class="headerlink">Account information</a>
              </li>
              <li>
                <a href="{{ route('privacy') }}" class="headerlink">Privacy information</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 mb-md-0 mb-4">

            <!-- Links -->
            <h5 class="text-uppercase">Other</h5>

            <ul class="list-unstyled">
              <li>
                <a href="{{ route('about') }}" class="headerlink">About us</a>
              </li>
              <li>
                <a href="{{ route('job_offers') }}" class="headerlink">Job offers</a>
              </li>
              <li>
                <a href="{{ route('latest_news') }}" class="headerlink">Latest news</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a> µsicwebshop.nl</a>
    </div>
    <!-- Copyright -->
    <script>
    $('.product-img, .product-img-small, .product-img-medium').each(function(){
      jQuery(this)[0].onerror = function() {
          jQuery(this)[0].src = "{{ asset('images/stock_image.png') }}";
      }
    });
    </script>
  </footer>
  <!-- Footer -->
