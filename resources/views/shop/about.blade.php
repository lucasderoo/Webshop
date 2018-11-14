@include('layouts.header')
<style>
  .card-img-top{
    object-fit: none;
    object-position: center;
    height: 180px;
    width: 280px;
    margin-top: 20px;

  }
</style>
<div class ="container">
  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="row">
        <div class="col-sm-12">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Meet the team!</h1>
              <p class="lead">Meet our talented and amazing team, and get to know who they are.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <h4>Our team is a group of hard-working, talented people. We strife to help you find the product you want, and we want to make your visit on our webshop a good memorable experience.<br></h4>
      </div>
      <br>
      <div class="row">
        <div class="card-deck">
          <div class="card">
            <img class="card-img-top rounded mx-auto d-block" src="images/Stock_photo_Anna.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Anna Palova</h5>
              <p class="card-text">Anna came to work with us a little over a month ago, and oversees all the processes which interact with the database.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Database Observer</small>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top rounded mx-auto d-block" src="images/Stock_photo_Jantje.jpeg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">John Doe</h5>
              <p class="card-text">John Doe is the newest addition to our group! He will mainly work for the customer service, so should you have any questions, you'll probably talk to John.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Customer Service</small>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top rounded mx-auto d-block" src="images/Stock_photo_Kim_Yiu.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Qin Shi Huang</h5>
              <p class="card-text">Qin Shi is the leader of the team. He manages most of the changes on the webshop, and helps the rest with their individual tasks.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Director</small>
            </div>
          </div>
        </div>
    </div>
    <br>
    <div class="row">
      <div class="card-deck">
        <div class="card">
          <img class="card-img-top rounded mx-auto d-block" src="images/Stock_photo_Lisa.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top rounded mx-auto d-block" src="images/Stock_photo_Luuk.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top rounded mx-auto d-block" src="images/Stock_photo_Julia.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
  </div>
  </div>
</div>
@include('layouts.footer')
