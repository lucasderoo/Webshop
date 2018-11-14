@include('layouts.header')
<style>
.row-space{


}

</style>
<div class="col-md-8">

  <h1 class="page-header">
    Website statistic
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



<div class="col-md-6">
               {!! $chart->html() !!}
            </div>

            <br/><br/>

  <div class="col-md-6">
               {!! $pie_chart->html() !!}
            </div>

            <br></br>



           <div class="col-md-6">
              {!! $line_chart->html() !!}
           </div>

           <br/><br/>

           <div class="col-md-6">
              {!! $areaspline_chart->html() !!}
           </div>

           <br/><br/>

           <div class="col-md-6">
              {!! $area_chart->html() !!}
           </div>

           <br/><br/>

           <div class="col-md-6">
              {!! $donut_chart->html() !!}
           </div>






            {!! Charts::scripts() !!}
              {!! $chart->script() !!}

             {!! $pie_chart->script() !!}
             {!! $line_chart->script() !!}

   {!! $areaspline_chart->script() !!}

   {!! $area_chart->script() !!}

   {!! $donut_chart->script() !!}




@include('layouts.footer')
