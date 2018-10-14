@include('layouts.header')
<style>
/* .test{ */
  /* background-color: red; */
  /* text-align: center; */
/* } */
.finished{
  text-align: center;
  border-color: black;
  /* background-color: lightblue: */
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
    /* background-color: lightblue: */
}
.Banner{
  text-align: center;
  width: 100%;
  border-color: black;

}
.container{
  border-color: black;
}

</style>
<br>
<br>
<br>
<div class="Banner">
  <div class="row justify-content-center">
    <div class="col-10">
      <a href="https://www.youtube.com/watch?v=uhBHL3v4d3I">
        <img class="Banner" src="http://www.metalinjection.net/wp-content/uploads/2016/08/METALLICA-HARD-WIRED-LISTEN-TO-THE-NEW-SONG-2016.jpg" alt="Metallica should be here" style="height:80%">
      </a>

    </div>
  </div>
</div>
<div class="container">
      <h5> Most viewed products</h5>
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
        <img src="https://www.large.nl/dw/image/v2/BBQV_PRD/on/demandware.static/-/Sites-master-emp/default/dwacf6daa8/images/4/2/2/8/422893.jpg?sw=350&sh=400&sm=fit&sfrm=png">
      </div>
      <div class="text-image-2">
        <h6> Metallica: Master of Puppets
        <br>
        Price: <strike>€16.99</strike> €6.99
        </h6>
      </div>
    </div>
    <div class="col finished">
      <div class="prod-image">
        <img src="https://target.scene7.com/is/image/Target/GUEST_431566be-ddb2-4cdb-af83-57328341ac95?wid=488&hei=488&fmt=pjpeg">
      </div>
      <div class="text-image-3">
        <h6> Nicki Minaj: Queen
        <br>
        Price: €19.99
        </h6>
      </div>
    </div>
    <div class="col finished">
      <div class="prod-image">
        <img src="https://s.s-bol.com/imgbase0/imagebase3/large/FC/8/1/5/3/9200000098273518.jpg">
      </div>
      <div class="text-image-4">
        <h6> Eminem: Kamikaze
        <br>
        Price: €16.99
        </h6>
      </div>
    </div>
  </div>
  <br><br>
      <h5> Highlighted items</h5>
  <div class="row justify-content-center">
    <div class="col finished">
      <div class="prod-image">
        <img src="http://st.cdjapan.co.jp/pictures/l/04/12/UICY-91800.jpg?v=1">
      </div>
      <div class="text-image-3">
        <h6> Rolling Stones: Rocks Off
        <br>
        Price: <strike>€15.99</strike> €10.99
        </h6>
      </div>
    </div>
    <div class="col finished">
      <div class="prod-image">
        <img src="https://s.s-bol.com/imgbase0/imagebase3/large/FC/1/5/6/7/9200000026727651.jpg">
      </div>
      <div class="text-image-2">
        <h6> Santana: Corazon
        <br>
        Price: <strike>€14.99</strike> €9.99
        </h6>
      </div>
    </div>
    <div class="col finished">
      <div class="prod-image">
        <img src="https://www.large.nl/dw/image/v2/BBQV_PRD/on/demandware.static/-/Sites-master-emp/default/dwacf6daa8/images/4/2/2/8/422893.jpg?sw=350&sh=400&sm=fit&sfrm=png">
      </div>
      <div class="text-image-2">
        <h6> Metallica: Master of Puppets
        <br>
        Price: <strike>€16.99</strike> €6.99
        </h6>
      </div>
    </div>
    <div class="col finished">
      <div class="prod-image">
        <img src="https://s.s-bol.com/imgbase0/imagebase3/large/FC/9/7/8/8/1000004006538879.jpg">
      </div>
      <div class="text-image-3">
        <h6> Genesis: Selling England by the Pound
        <br>
        Price: <strike>€14.99</strike> €10.99
        </h6>
      </div>
    </div>
  </div>
</div>
