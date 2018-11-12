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
                <h3>My Orders</h3>
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
                        <li>- <a class="selected-account-info" href="{{ route('account/orders') }}">My Orders</a></li>
                        <li>- <a href="{{ route('account/addresses') }}">My Addresses</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Order ID</td>
                                <td>Date</td>
                                <td>Amount</td>
                                <td>Status</td>
                                <td>Show</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user->orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->status }}</td>
                                <td><a class="btn btn-small btn-warning" href="{{ route('account/order/show', ['id' => $order->id]) }}">Show</a></td>
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