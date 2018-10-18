@include('layouts.header')
<style>
.pages {
    display: inline-block;
}

.pages a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
    cursor: pointer;
}

.pages a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pages a:hover:not(.active-page) {background-color: #ddd;}

.pages a:first-child {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.pages a:last-child {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}

.center {
    text-align: center;
}

.active-page{
    background-color: #2570e8 !important;
    color: white !important;
    border: 1px solid #2570e8 !important;
}
</style>
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
                            <option>Price high to low</option>
                            <option>Price low to high</option>
                            <option>date new to old</option>
                            <option>date old to new</option>
                            <option>most sold</option>
                          </select>                                
                      </div>
                </div>
            </div>

            <div class="row">
              <div class="col-md-4">
          	     <div class="card">
                    <form id="filter-form" action="{{ URL::current()}}"> 
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
                        <input type="number" name="min-price" value="{{ $request->has('min-price') ? $request->get('min-price') : 0 }}">
                        <label>Max. Price</label>
                        <input type="number" name="max-price" value="{{ $request->has('max-price') ? $request->get('max-price') : $maxPrice }}">
                    </article> <!-- card-group-item.// -->
                    <input type="hidden" name="page" id="page" value="1">
                    <input type="hidden" name="sortby" id="page" value="sold">
                    <input type="hidden" name="order" id="page" value="DESC">
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
                <div class="center">
                    <div class="pages">
                    <?php $pages = array_key_exists('pages', $paginationArray) ? $paginationArray['pages'] : 1; $currentPage = $request->has('page') ? $request->get('page') : 1; $pagesRangeEnd = $currentPage+2>=$pages ? $pages : $currentPage+5-$currentPage; $pagesRangeStart = $pages >= 5 ? $pagesRangeEnd-4 : 1; ?>
                        @if($pages > 1)
                        <a id="{{ $currentPage <= 1 ? $currentPage : $currentPage-1 }}">&laquo;</a>
                            @for ($pagesRangeStart; $pagesRangeStart <= $pagesRangeEnd; $pagesRangeStart++)
                                <a class="{{ $currentPage == $pagesRangeStart ? 'active-page' : ''}}" id="{{ $pagesRangeStart }}">{{ $pagesRangeStart }}</a>
                            @endfor
                        <a id="{{ $currentPage >= $pages ? $currentPage : $currentPage+1 }}">&raquo;</a>
                        @endif
                    </div>
                </div>
                <script>
                    $(".pages").on('click', 'a', function (e) {
                        var id = event.target.id;
                        document.getElementById("page").value = id;
                        document.getElementById("filter-form").submit();
                    });


                </script>
            </div>
    </div>
</div>
@include('layouts.footer')