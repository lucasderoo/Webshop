@include('layouts.header')
<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2 products-index">
        @include('layouts.feedback')
            <div class="admin-top">
                <h3>Results for "{{ $s }}"</h3>
            </div>
            <hr>
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
        </div>
    </div>
</div>
@include('layouts.footer')