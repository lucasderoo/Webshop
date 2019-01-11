<!DOCTYPE HMTL>
<style>
.Logotje
{
  width: 100%;
  height: auto;
  /* margin-right: -200px; */
}



</style>

<html>
<head>
    <title>Webshop</title>
    <!-- META -->
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <!-- ICONS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- JS -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top main-nav" style="background-color: #2570e8;">
  <!-- <div class="navbar-collapse" id="navbarSupportedContent"> -->
    <ul class="navbar-nav mr-auto">
      <a href="{{ route('home') }}">
       <img class="Logotje" src="{{asset('images/logo2.png') }}"/>
     </a>
      <li class="nav-item">
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('products') }}">Music</a>
      </li>
    </ul>
    <ul class="navbar-nav nav-search">
      <li class="nav-item">
        <form id="search-form" action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" name="s" placeholder="Search..." aria-label="Search" style="width:350px;" required>
        </form>
      </li>
    </ul>
    <ul class="navbar-nav nav-right">
      <li class="nav-item dropdown" style="cursor:pointer;">
          <img src="{{asset('images/user_icon.svg') }}">
          <div id="myDropdown" class="dropdown-content">
            @if(Auth::guest())
              <a href="{{ route('login') }}">Login</a>
              <a href="{{ route('register') }}">Register</a>
            @elseif(!Auth::guest() AND Auth::user()->user_account_type == 1)
              <a href="{{ route('account') }}">Account</a>
              <a href="{{ route('account/orders') }}">Orders</a>
              <a href="{{ route('account/addresses') }}">Addresses</a>
            @elseif(!Auth::guest() AND Auth::user()->user_account_type == 2 OR Auth::user()->user_account_type == 3)
              <a href="{{ route('admin') }}">{{ Auth::user()->user_account_type == 2 ? 'Manager' : 'Admin' }}</a>
            @endif
            @if(!Auth::guest())
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            @endif
          </div>
      </li>
      @if(!Auth::guest() AND Auth::user()->user_account_type == 1)
      <a href="{{ route('favourites') }}"><li class="nav-item">
          <img src="{{asset('images/fav_icon.svg') }}">
      </li></a>
      @endif
      <a href="{{ route('cart') }}"><li class="nav-item">
          <img src="{{asset('images/cart_icon.svg') }}">
          <span style="text-decoration: none !important;"class='badge badge-warning' id='lblCartCount'> {{ $cart_items }} </span>
      </li></a>
    </ul>
  <!-- </div> -->
</nav>
