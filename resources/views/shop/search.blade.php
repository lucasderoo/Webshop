@include('layouts.header')
<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2 products-index">
        @include('layouts.feedback')
            <div class="admin-top">
                <h3>Results for "{{ $s }}"</h3>
            </div>
            <hr>
            <div class="col-md-12">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-3" style="margin-bottom: 30px;">
                        <div class="product-div">
                            <a href="{{ route('show', [ 'slug' => $product->slug]) }}"><img class="product-img" style="width: 100%;" src="{{asset('images/uploads/products/product_').$product->id.'/img_'.$product->main_image_url.'.png'}}"></a>
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
</div>

<script>
$('.product-img').each(function(){
    jQuery(this)[0].onerror = function() {
        jQuery(this)[0].src = "/images/stock_image.png";
    }
});
</script>
@include('layouts.footer')