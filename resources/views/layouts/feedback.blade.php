@if(Session::has('feedback_success'))
    <div class="alert alert-success"><p>{{ Session::get('feedback_success') }}</p></div>
@endif
@if(Session::has('feedback_error'))
    <div class="alert alert-danger"><p>{{ Session::get('feedback_error') }}</p></div>
@endif