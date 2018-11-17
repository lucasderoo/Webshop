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
        <input type="hidden" id="delivery-input" name="deliveryaddress" value="">
        <div class="row">
        @foreach($user->addresses as $address) 
        <div class="col-4" style="margin-top:20px; margin-bottom:20px;">
        <h4>{{  $user->member->firstname }} {{  $user->member->lastname }}</h4>
        <div>{{ $address->street }} {{ $address->house_number }}</div>
        <div>{{ $address->city }}</div>
        <div>{{ $address->zipcode }}</div>
        <div>{{ $address->country }}</div> 
        <button type="button" id="{{ $address->id }}" class="btn btn-outline-primary" style="margin-top:10px;">Deliver to this address</button>       
        </div>
        @endforeach
        </div>
    </form>
</div>


<script>
$(document).on('click', '.btn', function (e) {
                        var id = e.target.id;
                        document.getElementById("delivery-input").value = id;
                        document.getElementById("address-form").submit();
                    });
</script>