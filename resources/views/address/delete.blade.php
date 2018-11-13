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
            <div class="admin-top">
                <h3>Delete Address</h3>
            </div>
            <hr>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="">
                {{ csrf_field() }}
                    <div class="form-input">
                        <label for="name" class="control-label">name</label>
                        <tr>
                                
                        <tr>
                    </div>
                    <br>
                    <div class="form-input">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')