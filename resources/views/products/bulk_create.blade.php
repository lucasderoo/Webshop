@include('layouts.header')

<script type="text/javascript" src="{{ URL::asset('js/croppie.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/croppie.css') }}" />
<script type="text/javascript" src="{{ URL::asset('js/product-image-upload.js') }}"></script>

<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2 products-add">
        @include('layouts.feedback')
        <div class="admin-top">
            <h3>Bulk add Product</h3>
        </div>
        <hr>
        <div>
            <p>{{ session('status') }}</p>
            <form method="POST" action="" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                <label for="file" class="control-label">CSV file to import</label>
                
                <input id="file" type="file" class="form-control" name="file" required>

                @if ($errors->has('file'))
                    <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif
                
            </div>
             
            <p><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Submit</button></p>

            </form>
        </div>
    </div>
</div>
@include('layouts.footer')