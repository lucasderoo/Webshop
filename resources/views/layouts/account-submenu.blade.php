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
        <li>- <a class="selected-account-info" href="{{ route('account') }}">Account info</a></li>
        <li>- <a href="{{ route('account/orders') }}">My Orders</a></li>
        <li>- <a href="{{ route('account/adresses') }}">My Adresses</a></li>
    </ul>
</div>
