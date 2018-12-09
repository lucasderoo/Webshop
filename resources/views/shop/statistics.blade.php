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

        @for($i=0, $count = count($Lessthan50Name);$i<$count;$i++)



  <tr bgcolor="red">
    <td>Less than 50 in the inventory</td>
    <td>{{$Lessthan50Name[$i]}}</td> <td>{{$Lessthan50[$i]}}</td>
      </tr>

  @endfor




</table>





            <br/><br/>

  <div class="col-md-6">
               {!! $pie_chart->html() !!}
            </div>

            <br></br>
              <div class="col-md-6">
                           {!! $pie_chart2->html() !!}
                        </div>

                        <br></br>



           <div class="col-md-6">
              {!! $line_chart->html() !!}
           </div>

           <br/><br/>


           <br></br>
            <div class="col-md-6">
             {!! $line_chart2->html() !!}
            </div>

            <br></br>
             <div class="col-md-6">
              {!! $line_chart3->html() !!}
             </div>












            {!! Charts::scripts() !!}


             {!! $pie_chart->script() !!}
             {!! $pie_chart2->script() !!}

             {!! $line_chart->script() !!}

             {!! $line_chart2->script() !!}
             {!! $line_chart3->script() !!}








@include('layouts.footer')
