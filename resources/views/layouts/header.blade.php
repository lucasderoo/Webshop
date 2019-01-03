<!DOCTYPE HMTL>
<html>
<head>
    <title>Webshop</title>
    <!-- META -->
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <!-- JS -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>


<nav class="navbar navbar-expand-lg sticky-top main-nav" style="background-color: #2570e8;">
  <a class="navbar-brand" href="{{ route('home') }}">LOGO HERE</a>
  </button>

  <!-- <div class="navbar-collapse" id="navbarSupportedContent"> -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('products') }}">Products</a>
      </li>
    </ul>
    <ul class="navbar-nav nav-search">
      <li class="nav-item">
        <form id="search-form" action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" name="s" placeholder="Search for music!" aria-label="Search" style="width:350px;" required>
        </form>
      </li>
    </ul>
    <ul class="navbar-nav nav-right">
      <li class="nav-item dropdown" style="cursor:pointer;">
          <img src="{{asset('images/user_icon.svg') }}">
          <small class="icon_text">
          @if(Auth::guest())
          Login
          @elseif(!Auth::guest() AND Auth::user()->user_account_type == 1)
          Account
          @elseif(!Auth::guest() AND Auth::user()->user_account_type == 2)
          Manager
          @elseif(!Auth::guest() AND Auth::user()->user_account_type == 3)
          Admin
          @endif</small>
          <div id="myDropdown" class="dropdown-content">
            @if(Auth::guest())
              <a href="{{ route('login') }}">Login</a>
              <a href="{{ route('register') }}">Register</a>
            @elseif(!Auth::guest() AND Auth::user()->user_account_type == 1)
              <a href="{{ route('account') }}">Account</a>
              <a href="{{ route('account/orders') }}">Orders</a>
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
      <a href="{{ route('favourites') }}"><li class="nav-item" style="padding-left: 6px !important; margin-left: 9px !important;">
          <img src="{{asset('images/fav_icon.svg') }}">
          <small style="margin-left: -6px;" class="icon_text">Favourites</small>
      </li></a>
      @endif
      <a href="{{ route('cart') }}"><li class="nav-item">
          <img src="{{asset('images/cart_icon.svg') }}">
          <span style="text-decoration: none !important;"class='badge badge-warning' id='lblCartCount'> 5 </span>
          <small class="icon_text">Cart</small>
      </li></a>
    </ul>
  <!-- </div> -->
</nav>