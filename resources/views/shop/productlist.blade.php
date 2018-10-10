@include('layouts.header')
<div class="container">
<div class="row">
	<div class="col-10">
	<h2>Music Products</h2>
	</div>
	<div class="col-2">
	<div class="form-group">
    	<select id="pref-orderby" class="form-control">
            <option>Price</option>
			<option>Date</option>
        </select>                                
    </div> <!-- form group [order by] -->
	</div>
	<div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                </div>
            </div>
    </div>
  </div>
  <div class="row">
    <div class="col-2">
	@include('layouts.genrefilter')
    </div>
	<div class="col-3">
      One of three columns
    </div>
    <div class="col-3">
      One of three columns
    </div>
    <div class="col-3">
      One of three columns
    </div>
  </div>
</div>
@include('layouts.footer')