@include('layouts.header')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-8">
                    <h2>Products</h2>
                </div>
              	<div class="col-4">
                  	<div class="form-group">
                      	<select id="pref-orderby" class="form-control">
                            <option value="">Price high to low</option>
                            <option value="">Price low to high</option>
                            <option value="">date new to old</option>
                            <option value="">date old to new</option>
                          </select>                                
                      </div>
                </div>
            </div>

            <div class="row">
              <div class="col-md-4">
          	     <div class="card">
                    <form action="{{ URL::current()}}"> 
                    <!-- <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Category</h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                @foreach($categories as $category)
                                <label class="form-check">
                                  <input class="form-check-input" type="checkbox" value="{{ $category->name }}">
                                  <span class="form-check-label">{{ $category->name }}</span>
                                </label>
                                @endforeach
                            </div> 
                        </div>
                    </article> -->
                    
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Genre</h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                            <?php $sel_genre = $request->has('genres') ? $request->get('genres') : [];?>
                            @for ($i = 0; $i < count($genres); $i++)
                            <label class="form-check">
                                <input name="genres[]" class="form-check-input" type="checkbox" value="{{ $genres[$i] }}" {{ in_array($genres[$i], $sel_genre) ? 'checked' : ''}}>
                                <span class="form-check-label">{{ $genres[$i] }}</span>
                            </label>
                            @endfor
                            </div>
                        </div>
                    </article> <!-- card-group-item.// -->

                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Artist</h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                            <?php $sel_artist = $request->has('artists') ? $request->get('artists') : [];?>
                            @for ($i = 0; $i < count($artists); $i++)
                            <label class="form-check">
                                <input name="artists[]" class="form-check-input" type="checkbox" value="{{ $artists[$i] }}" {{ in_array($artists[$i], $sel_artist) ? 'checked' : ''}}>
                                <span class="form-check-label">{{ $artists[$i] }}</span>
                            </label>
                            @endfor
                            </div>
                        </div>
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Price</h6>
                        </header>
                        <label>Min. Price</label>
                        <input type="number" name="min-price" value="{{ $request->get('min-price') }}">
                        <label>Max. Price</label>
                        <input type="number" name="max-price" value="{{ $request->get('max-price') }}">
                    </article> <!-- card-group-item.// -->
                    <button type="submit" class="btn btn-block btn-outline-primary" style="margin-top: 52px;">Apply</button>
                    </form>
                </div> <!-- card.// -->
              </div>
          	<div class="col-8">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4" style="margin-bottom: 30px;">
                        <div class="product-div">
                            <a href="{{ route('show', [ 'slug' => $product->slug]) }}"><img id="product-img" style="width: 100%;" src="{{asset('images/uploads/products/product_').$product->id.'/img_'.$product->main_image_url.'.png'}}"></a>
                            @if($product->productable_type == "App\MusicProduct")
                                <div>{{ strlen($product->productable->artist) > 18 ? substr($product->productable->artist,0,15).'...' : $product->productable->artist }}</div>
                            @endif
                            <div>{{ strlen($product->title) > 18 ? substr($product->title,0,15).'...' : $product->title }}</div>
                            <h5>€{{ $product->price }}</h5>
                            <button type="button" class="btn btn-primary" style="margin-top:10px; width: 100%;">Add product to cart</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
</div>
@include('layouts.footer')