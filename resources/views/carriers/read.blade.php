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
                <h3>Show Carrier</h3>
            </div>
            <hr>
            <div class="panel-body">
                <div class="form-input">
                    <label for="name" class="control-label">Name</label>
                    <p>{{ $carrier->name }}</p>
                </div>
                <p>// All Music products will come here //</p>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')