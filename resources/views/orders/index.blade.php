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
        @include('layouts.admin-submenu')
            <div class="admin-top">
                <h3>Orders</h3>
            </div>
            <hr>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Email</td>
                        <td>Name</td>
                        <td>Amount</td>
                        <td>Status</td>
                        <td>Payment method</td>
                        <td>Created At</td>
                        <td>Show</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td><a class="btn btn-small btn-warning" href="{{ route('admin/orders/show', ['id' => $order->id]) }}">Show</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if($orders->lastPage() > 1)
            <div class="center">
                <div class="pages">
                <ul class="pagination">
                    <li>
                        <a href="{{ $orders->previousPageUrl() }}">Previous</a>
                    </li>
                    <li style="height: 23px;margin-top: 10px;margin-left: 10px;margin-right: 10px;">
                        Page {{ $orders->currentPage() }} of {{ $orders->lastPage() }}
                    </li>
                    <li>
                        <a href="{{ $orders->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')