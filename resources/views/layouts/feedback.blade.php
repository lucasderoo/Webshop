@if(Session::has('feedback_success_cart'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_cart') }}</p> <a class="btn btn-primary float-right" href="{{ route('cart') }}" role="button" style="margin-top:-38px;">Go to cart</a></div>
@endif
@if(Session::has('feedback_success_updated'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_updated') }}</p></div>
@endif
@if(Session::has('feedback_success_favo_add'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_favo_add') }}</p><a class="btn btn-primary float-right" href="{{ route('favourites') }}" role="button" style="margin-top:-38px;">Go to favourites</a></div>
@endif
@if(Session::has('feedback_success_favo_remove'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_favo_remove') }}</p></div>
@endif
@if(Session::has('feedback_success_favo_change'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_favo_change') }}</p></div>
@endif
@if(Session::has('feedback_success_carrier'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_carrier') }}</p></div>
@endif
@if(Session::has('feedback_success_category'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_category') }}</p></div>
@endif
@if(Session::has('feedback_success_home_page'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_home_page') }}</p></div>
@endif
@if(Session::has('feedback_success_admin_product'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_admin_product') }}</p></div>
@endif
@if(Session::has('feedback_success_user_create'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_user_create') }}</p></div>
@endif
@if(Session::has('feedback_success_user_update'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_user_update') }}</p></div>
@endif
@if(Session::has('feedback_success_user_password'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_user_password') }}</p></div>
@endif
@if(Session::has('feedback_success_user_delete'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_user_delete') }}</p></div>
@endif
@if(Session::has('feedback_success_account'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_account') }}</p></div>
@endif
@if(Session::has('feedback_success_account_address'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_account_address') }}</p></div>
@endif
@if(Session::has('feedback_success_password_change'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success_password_change') }}</p></div>
@endif
@if(Session::has('feedback_error'))
    <div class="alert alert-danger"><p>{{ Session::get('feedback_error') }}</p></div>
@endif
