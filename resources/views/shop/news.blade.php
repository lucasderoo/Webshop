@include('layouts.header')
<div class ="container">
  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="row">
        <div class="col-sm-12">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Latest News</h1>
              <p class="lead">Check here to see the latest adaptations, additions and changes to the webshop</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              13 November 2018
            </div>
            <div class="card-body">
              <h5 class="card-title">New CD's added!</h5>
              <p class="card-text">Check the newest additions to our shop!</p>
              <img src="/images/Kamikaze_Eminem_Front.jpg" style="width:150px; height:150px"/>
              <a style="margin-top:20px" href="/products?min-price=0&max-price=100&page=1&sortby=sold&order=DESC" class="btn btn-primary">Click here</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              21 October 2018
            </div>
            <div class="card-body">
              <h5 class="card-title">New Staff Member!</h5>
              <p class="card-text">We're proud to welcome John Doe to our team! He'll be working at our Customer Service, so should you have any questions regarding products, shipping, delivery times, or payments, He'll be happy to answer all your questions.</p>
              <a href="{{ route('customer_service') }}" class="btn btn-primary">Click here</a>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              24 September 2018
            </div>
            <div class="card-body">
              <h5 class="card-title">Welcome! We're open for business!</h5>
              <p class="card-text">After some time, we are finally able to welcome you to our webshop! <br>Please enjoy browsing though our products, and don't hesitate to ask any questions about our products.</p>
              {{-- <a href="#" class="btn btn-primary">Click here</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.footer')
