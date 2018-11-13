@include('layouts.header')
<style>
.admin-top  h3{
    float: left;
}
.admin-top  a{
    float: right;
}
.admin-top {
    height: 38px;
}
</style>
<div class="container">    
    <div class="row">
        <div class="col-md-8 offset-md-2 products-index">
        @include('layouts.feedback')
            <div class="admin-top">
                <h3>My Addresses</h3>
                <a class="btn btn-success" href="{{ URL::to('account/addresses/create') }}">New Address</a>
            </div>
            <hr>
            <div class="row">
                <style>
                .account-menu{
                    padding: 0;
                }

                .account-menu li{
                    list-style-type: none;
                }
                .account-menu a{
                    text-decoration: none;
                    color: black;
                }
                .account-menu a:hover{
                    text-decoration: underline;
                }
                .selected-account-info{
                    text-decoration: underline !important;
                    color: #2570e8 !important;
                }
                </style>
                <div class="col-md-2">
                    <ul class="account-menu">
                        <li>- <a href="{{ route('account') }}">Account info</a></li>
                        <li>- <a href="{{ route('account/orders') }}">My Orders</a></li>
                        <li>- <a href="{{ route('account/addresses') }}" class="selected-account-info">My Addresses</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Street</td>
                                <td>House number</td>
                                <td>Zipcode</td>
                                <td>City</td>
                                <td>Country</td>
                                <td>Edit</td>
                                <td>Delete</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user->addresses as $address)
                            <tr>
                                <td>{{ $address->street }}</td>
                                <td>{{ $address->house_number }}{{ $address->suffix }}</td>
                                <td>{{ $address->zipcode }}</td>
                                <td>{{ $address->city }}</td>
                                <td>{{$address->country}}</td>
                                <td><a class="btn btn-small btn-info" href="{{ route('account/addresses/edit', ['id' => $address->id]) }}">Edit</a></td>
                                <td><a class="btn btn-small btn-danger" href="{{ route('account/addresses/delete', ['id' => $address->id]) }}">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')