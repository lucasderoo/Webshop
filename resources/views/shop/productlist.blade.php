@include('layouts.header')
<div class="container">
<div class="row">
	<div class="col-10">
	<h2>Products</h2>
	</div>
	<div class="col-2">
	<div class="form-group">
    	<select id="pref-orderby" class="form-control">
            <option>Price</option>
			<option>Date</option>
        </select>                                
    </div> <!-- form group [order by] -->
	</div>

  </div> <!-- first row -->

  <div class="row">
    <div class="col-2">
	@include('layouts.genrefilter')
    </div>
    <div class="col-1"></div>
	<div class="col-9" style="background-color: #cee1ff;">
    <div class="row">
      </div>
  <div class="row">
  <div class="col-sm-4" style="height:400px;background-color:red;">productquery</div>
  <div class="col-sm-4" style="height:400px;background-color:green;">productquery</div>
  <div class="col-sm-4" style="height:400px;background-color:purple;">productquery</div>
  </div>  
  <div class="row">
  <div class="col-sm-4" style="height:400px;background-color:green;">productquery</div>
  <div class="col-sm-4" style="height:400px;background-color:purple;">productquery</div>
  <div class="col-sm-4" style="height:400px;background-color:red;">productquery</div>
  </div>
</div>
</div>
</div>
@include('layouts.footer')