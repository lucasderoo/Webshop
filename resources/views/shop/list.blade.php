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
.hide-filter{
    display: none;
}

.more-section{
    color: #0069d9 !important;
}
.more-section:hover{
    text-decoration: underline !important;
    cursor: pointer;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        @include('layouts.feedback')
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 10px;">
            @if(!empty($request['genres']))
                @foreach($request['genres'] as $genre)
                <span class="badge badge-secondary" style="background-color: #2570e8; padding: 6px;">{{ $genre }}</span>
                @endforeach
            @endif
            @if(!empty($request['artists']))
                @foreach($request['artists'] as $artist)
                <span class="badge badge-secondary" style="background-color: #2570e8; padding: 6px;">{{ $artist }}</span>
                @endforeach
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <h2>Products</h2>
            </div>
          	<div class="col-4">
              	<div class="form-group">
                  	<select id="select-orderby" class="form-control">
                        <option value="price-high-low" {{ $orderBy == "price-high-low" ? 'selected': '' }}>Price high to low</option>
                        <option value="price-low-high" {{ $orderBy == "price-low-high" ? 'selected': '' }}>Price low to high</option>
                        <option value="date-new-old" {{ $orderBy == "date-new-old" ? 'selected': '' }}>Date new to old</option>
                        <option value="date-old-new" {{ $orderBy == "date-old-new" ? 'selected': '' }}>Date old to new</option>
                        <option value="sold" {{ $orderBy == "sold" ? 'selected': '' }}>Most sold</option>
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
                        <?php $sel_genre = $request->has('genres') ? $request->get('genres') : []; $g = 1;?>

                        @for ($i = 0; $i < count($genres); $i++)
                            @if($i == 5*$g)
                                <?php $g = $g + 1;?>
                                <a class="more-section more-genre-section {{ $g > 2 ? 'hide-filter': '' }}" id={{"more-genre".$g}}>more</a>
                            @endif
                            <label class="form-check {{ $i > 4 ? 'hide-filter': '' }} more-genre-section-{{ $i > 4 ? $g: '' }}">
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
                        <?php $sel_artist = $request->has('artists') ? $request->get('artists') : []; $a = 1;?>
                        @for ($i = 0; $i < count($artists); $i++)
                        @if($i == 5*$a)
                                <?php $a = $a + 1;?>
                                <a class="more-section more-artist-section {{ $a > 2 ? 'hide-filter': '' }}" id={{"more-artist".$a}}>more</a>
                            @endif
                        <label class="form-check {{ $i > 4 ? 'hide-filter': '' }} more-artist-section-{{ $i > 4 ? $a: '' }}">
                            <input name="artists[]" class="form-check-input" type="checkbox" value="{{ $artists[$i] }}" {{ in_array($artists[$i], $sel_artist) ? 'checked' : ''}}>
                            <span class="form-check-label">{{ $artists[$i] }}</span>
                        </label>
                        @endfor
                        </div>
                    </div>
                </article> <!-- card-group-item.// -->
                <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">Release Date</h6>
                    </header>
                    <label>Min. Date</label>
                    <input type="date" name="min-date" value="{{ $minDate }}">
                    <label>Max. Date</label>
                    <input type="date" name="max-date" value="{{ $maxDate }}">
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
                <input type="hidden" name="orderby" id="orderby" value="sold">
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
                        <form role="form" method="POST" action="{{ route('cart/create', ['slug' => $product->slug]) }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary" style="margin-top:10px; width: 100%;">Add product to cart</button>
                        </form>
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
                    document.getElementById("page").value = e.target.id;
                    document.getElementById("filter-form").submit(); 
                });

                $('#select-orderby').on('change', function(e) {
                    document.getElementById("orderby").value = e.target.value;
                    document.getElementById("filter-form").submit();
                });

                $(document).on('click', '.more-genre-section', function (e) {
                    var id = e.target.id;
                    var id = id.substr(id.length - 1);
                    $(".more-genre-section-"+id).css("display", "block");
                    $("#more-genre"+id).css("display", "none");
                    var id = parseInt(id, 10)+1;
                    $("#more-genre"+id).css("display", "block");
                });

                $(document).on('click', '.more-artist-section', function (e) {
                    var id = e.target.id;
                    var id = id.substr(id.length - 1);
                    $(".more-artist-section-"+id).css("display", "block");
                    $("#more-artist"+id).css("display", "none");
                    var id = parseInt(id, 10)+1;
                    $("#more-artist"+id).css("display", "block");
                });

                function get(name){
                   if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
                      return decodeURIComponent(name[1]);
                }

                var genres = {!! json_encode($request['genres']) !!};
                var artists = {!! json_encode($request['artists']) !!};

                if(genres != null){
                    for (var i = 0; i <= genres.length-1; i++) {
                            var el = document.querySelectorAll('input[value="'+genres[i]+'"]');
                            var par = el[0].parentElement;

                            var f = par.classList[par.classList.length-1].match(/\d+$/);

                            var r = 0;
                            if(f != null){
                                if(f > 2 && f > r){
                                    for (var l = 2; l <= f; l++) {
                                        $("#more-genre"+i).css("display", "none");
                                        $(".more-genre-section-"+i).css("display", "block");
                                    }
                                    r = f;
                                }
                                $(".more-genre-section-"+f).css("display", "block");
                                $("#more-genre"+f).css("display", "none");
                                var id = parseInt(f, 10)+1;
                                $("#more-genre"+id).css("display", "block");
                            }
                    }
                }

                if(artists != null){
                    for (var i = 0; i <= artists.length-1; i++) {
                            var el = document.querySelectorAll('input[value="'+artists[i]+'"]');
                            var par = el[0].parentElement;

                            var f = par.classList[par.classList.length-1].match(/\d+$/);

                            var r = 0;
                            if(f != null){
                                if(f > 2 && f > r){
                                    for (var l = 2; l <= f; l++) {
                                        $("#more-artist"+i).css("display", "none");
                                        $(".more-artist-section-"+i).css("display", "block");
                                    }
                                    r = f;
                                }
                                $(".more-artist-section-"+f).css("display", "block");
                                $("#more-artist"+f).css("display", "none");
                                var id = parseInt(f, 10)+1;
                                $("#more-artist"+id).css("display", "block");
                            }
                    }
                }

            </script>
        </div>
    </div>
</div>
@include('layouts.footer')