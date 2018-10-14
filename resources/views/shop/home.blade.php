@include('layouts.header')
<style>
.test{
  background-color: red;
  text-align: center;
}
.finished{
  text-align: center;
}
.first-image{
	width: 100%;
	height: 200px;
	float: middle;
}
.prod-image img{
	margin: auto;
	display: block;
  margin-top: 15px;
	margin-bottom: 15px;
	width: 200px;
	height: 200px;
}
.Banner{
  text-align: center;
}

</style>
<div class="Banner">
  <div class="row justify-content-center">
    <div class="col-10">
      <img class="Banner" src="http://cdn-02.dagelijksestandaard.nl/wp-content/uploads/2017/12/landscape-queen-bohemian-rhapsody-still-1132x670.jpg" alt="Queen should be here" style="height:80%">

    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col finished">
      <div class="prod-image">
        <a href="http://schoolwebshop.nl/product/queen">
          <img src="https://www.udiscovermusic.com/wp-content/uploads/2018/04/queen-ii.jpg">
          </div>
          <div class="text-image-1">
            <h6> Queen II: LP
            <br>
            Price: €27.99
            </h6>
          </div>
      </a>
    </div>
    <div class="col finished">
      <div class="prod-image">
        <img src="https://via.placeholder.com/80x60">
      </div>
      <div class="text-image-2">
        <h6> Lorum: Ipsum
        <br>
        Price: €10.99
        </h6>
      </div>
    </div>
    <div class="col finished">
      <div class="prod-image">
        <img src="https://via.placeholder.com/80x60">
      </div>
      <div class="text-image-3">
        <h6> Lorum: Ipsum
        <br>
        Price: €10.99
        </h6>
      </div>
    </div>
    <div class="col finished">
      <div class="prod-image">
        <img src="https://via.placeholder.com/80x60">
      </div>
      <div class="text-image-4">
        <h6> Lorum: Ipsum
        <br>
        Price: €10.99
        </h6>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col">
      1 of 4
    </div>
    <div class="col">
      1 of 4
    </div>
    <div class="col">
      1 of 4
    </div>
    <div class="col">
      1 of 4
    </div>
  </div>
</div>



@include('layouts.footer')