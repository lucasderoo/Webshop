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
    <div class="col-md-2">
	@include('layouts.genrefilter')
    </div>
    <div class="col-1"></div>
	<div class="col-9">
    <div class="row">
      </div>
  <div class="row">
  @include('layouts.product-small')
  @include('layouts.product-small')
  @include('layouts.product-small')
  @include('layouts.product-small')
  @include('layouts.product-small')
  @include('layouts.product-small')
  @include('layouts.product-small')
  @include('layouts.product-small')
  @include('layouts.product-small')


  </div>
</div>
</div>
</div>
@include('layouts.footer')