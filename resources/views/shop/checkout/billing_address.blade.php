@include('layouts.header')

<div class="container">
    <div class="row">
        <div class=col-12 style="margin:10px; border:1px;">
        <h2>Please select a billing address.</h2>
        <div>If the address you would like to use is displayed simply click "Deliver to this address".
        Otherwise you can add an address below.</div>
        </div>
    </div>
    <div class="row" style="border-bottom: 1px  solid;">

    @foreach($user->addresses as $address) 
    <div class=col-4 style="margin-top:20px; margin-bottom:20px;">
    <h4>{{  $user->member->firstname }} {{  $user->member->lastname }}</h4>
    <div>{{ $address->street }} {{ $address->house_number }}</div>
    <div>{{ $address->city }}</div>
    <div>{{ $address->zipcode }}</div>
    <div>{{ $address->country }}</div> 
    <button type="button" class="btn btn-outline-primary" style="margin-top:10px;">Deliver to this address</button>       
    </div>
    @endforeach
    
</div>
