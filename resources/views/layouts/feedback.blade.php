@if(Session::has('feedback_success'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success') }}</p> <a class="btn btn-primary float-right" href="{{ route('cart') }}" role="button" style="margin-top:-38px;">Go to cart</a></div>
@endif
@if(Session::has('feedback_success_updated'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_updated') }}</p></div>
@endif
@if(Session::has('feedback_success_favo_add'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_favo_add') }}</p><a class="btn btn-primary float-right" href="{{ route('favourites') }}" role="button" style="margin-top:-38px;">Go to favourites</a></div>
@endif
@if(Session::has('feedback_success_favo_change'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_favo_change') }}</p></div>
@endif
@if(Session::has('feedback_error'))
    <div class="alert alert-danger"><p>{{ Session::get('feedback_error') }}</p></div>
@endif

checkout
