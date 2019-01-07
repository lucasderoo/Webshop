@include('layouts.header')

<style>
.row-space{


}

.card_body{
background-color:Tomato;"
}
</style>
<div class="container">
<div class="row">
    <div class="col-md-8 offset-md-2">
    @include('layouts.feedback')
        @include('layouts.admin-submenu')
    </div>
</div>

<div class="col-md-8">

  <h1 class="page-header">
    Website statistics
    <small></small>
  </h1>

  <div>

    <table class="table table-hover">
        <tr>
              <td>All the Users</td>
              <td>{{$users}}</td>
        </tr>
        <tr>
              <td>All the customers</td>
              <td>{{$customers}}</td>
        </tr>
        <tr>
              <td>All the admins</td>
              <td>{{$admins}}</td>
        </tr>
        <tr>
              <td>All the Managers</td>
              <td>{{$managers}}</td>
        </tr>

        <tr>
              <td>All the Products</td>
              <td>{{$products}}</td>
        </tr>
        <tr>
              <td>The inventory</td>
              <td>{{$stock}}</td>
        </tr>
      </table>
    </div>





        <div class="accordion-fluid" id="accordionExample" bgcolor="red">
            <div class="card card-fluid" bgcolor="red">
              <div class="card-header" id="headingOne" bgcolor="red">
                <h5 class="mb-0" bgcolor="red">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" color="red">
                      Products that are almost sold out.
                  </button>
                </h5>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" bgcolor="red">
                <div class="card-body" bgcolor="red">
                  @for($i=0, $count = count($Lessthan50Name);$i<$count;$i++)
                <p><u>  {{$Lessthan50Name[$i]}} with only <b>{{$Lessthan50[$i]}}</b> copies left in the stock.</u></p>
                  @endfor
                </div>
              </div>
            </div>
          </div>
          </div>









<div>
            <br/><br/>

            <div class="container">
              <div class="row">
                <div class="col">
                                 {!! $pie_chart->html()!!}
                                 </div>

                                   <div class="col">

                                     {!! $pie_chart2->html()!!}



</div>
</div>
<div class="row">
  <div class="col">
{!! $line_chart->html() !!}
</div>
<div class="col">
  {!! $line_chart2->html() !!}
</div>
<div class="col">

{!! $line_chart3->html() !!}

</div>
</div>














            {!! Charts::scripts() !!}


             {!! $pie_chart->script() !!}
             {!! $pie_chart2->script() !!}

             {!! $line_chart->script() !!}

             {!! $line_chart2->script() !!}
             {!! $line_chart3->script() !!}








@include('layouts.footer')
