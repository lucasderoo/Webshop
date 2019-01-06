@include('layouts.header')
<div class ="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="row">
        <div class="col-sm-12">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Frequently Asked Questions</h1>
              <p class="lead">Here is a collection of questions we receive on a daily basis. <br>Should you have a different question, you can just fill in the form at the bottom and we'll reach out to you as soon as possible.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-sm-8  col-sm-offset-2">
      <div class="accordion-fluid" id="accordionExample">
          <div class="card card-fluid" >
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  I can't seem to find a product.
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                Not to worry. We can provide different solutions. <br>
                We can try to find the item for you, and give you a notification when we have obtained the product.<br>
                We can also try to find a supplier for you, so that you can see the product for yourself and can consider on your own if the price will be worth it.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How long does it take for my package to arrive?
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                This depends on the delivery service and your point of delivery.<br>
                We will always provide you with a tracking code to see where your package is, and how long it will take for the delivery service to bring it to you.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Can I ship it to my friend's house as a birthday present?
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                Of course you can! Just add his address to the list of addresses on your account and select that address for the package to go to.
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

@include('layouts.footer')
