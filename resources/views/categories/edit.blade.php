@include('layouts.header')

<style>

.admin-top a{
    display: inline-block;
    float: right;
}
.admin-top h3{
    display: inline-block;
}


</style>
<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @include('layouts.admin-submenu')
            <div class="admin-top">
                <h3>Edit Category</h3>
            </div>
            <hr>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="">
                {{ csrf_field() }}
                    <div class="form-input">
                        <label for="name" class="control-label">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <br>
                    <div class="form-input">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')