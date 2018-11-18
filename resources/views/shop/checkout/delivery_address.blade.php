@include('layouts.header')


<div class="container">
    <div class="row">
        <div class=col-12 style="margin:10px; border:1px;">
        <h2>Please select a delivery address.</h2>
        </div>
    </div>
    <div class="row" style="border-bottom: 1px  solid;">

    <form id="address-form" class="col-12" method="POST" action="">
        {{ csrf_field() }}
        <div class="row">
        @foreach($user->addresses as $address) 
        <div class="col-4" style="margin-top:20px; margin-bottom:20px;">
        <h4>{{  $user->member->firstname }} {{  $user->member->lastname }}</h4>
        <div>{{ $address->street }} {{ $address->house_number }}</div>
        <div>{{ $address->city }}</div>
        <div>{{ $address->zipcode }}</div>
        <div>{{ $address->country }}</div> 

        <input name="delivery_input" class="form-check-input" id="{{ $address->id }}" type="checkbox" value="{{ $address->id }}">
        <span class="form-check-label font-weight-bold">Deliver here</span>  
        </div>
        @endforeach

        <div class=col-12 style="margin:10px; border:1px;">
        <h2>Please select a billing address.</h2>
      
        <div class="row">
        @foreach($user->addresses as $address) 
        <div class="col-4" style="margin-top:20px; margin-bottom:20px;">
        <h4>{{  $user->member->firstname }} {{  $user->member->lastname }}</h4>
        <div>{{ $address->street }} {{ $address->house_number }}</div>
        <div>{{ $address->city }}</div>
        <div>{{ $address->zipcode }}</div>
        <div>{{ $address->country }}</div> 
        <input name="billing_input" class="form-check-input" id="{{ $address->id }}" type="checkbox" value="{{ $address->id }}">
        <span class="form-check-label font-weight-bold">Bill here</span>  

     
        </div>
        @endforeach

        </div>

        <button type="submit" class="btn btn-outline-primary" style="margin-top:10px;">Confirm</button> 
    </form>
</div>

<!-- <div class="container">
    <div class="row">
        <div class=col-12 style="margin:10px; border:1px;">
        <h2>Please select a billing address.</h2>
        </div>
    </div>
    <div class="row" style="border-bottom: 1px  solid;">

    <form id="address-form" class="col-12" method="POST" action="">
        {{ csrf_field() }}
        <input type="hidden" id="delivery-input" name="billingaddress" value="">
        <div class="row">
        @foreach($user->addresses as $address) 
        <div class="col-4" style="margin-top:20px; margin-bottom:20px;">
        <h4>{{  $user->member->firstname }} {{  $user->member->lastname }}</h4>
        <div>{{ $address->street }} {{ $address->house_number }}</div>
        <div>{{ $address->city }}</div>
        <div>{{ $address->zipcode }}</div>
        <div>{{ $address->country }}</div> 
        <input name="billing_input" class="form-check-input" id="{{ $address->id }}" type="checkbox" value="">
        <span class="form-check-label font-weight-bold">Bill here</span>  

     
        </div>
        @endforeach
        </div>
        <button type="submit" class="btn btn-outline-primary" style="margin-top:10px;">Confirm</button>   
    </form>
</div> -->


