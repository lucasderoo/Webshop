@include('layouts.header')

<div class="container">
    <div class="row">
        <div class=col-12 style="margin:10px; border:1px;">
        <h2>Please select a delivery address.</h2>
        <div>If the address you would like to use is displayed simply click "Deliver to this address".
        Otherwise you can add an address below.</div>
        </div>
    </div>
    <div class="row" style="border-bottom: 1px  solid;">
    @include('layouts.addressmini')
    @include('layouts.addressmini')
    @include('layouts.addressmini')
</div>