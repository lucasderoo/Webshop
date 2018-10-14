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


<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #2570e8;">
  <a class="navbar-brand" href="#">LOGO HERE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-light" href="#">Home</a>
      </li>
      @guest
      <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
      </li>
      @else
        @if(Auth::user()->user_account_type > 1)
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('Admin/products') }}">Admin</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Account</a>
          </li>
        @endif
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      @endif
      <li class="nav-item">
        <a class="nav-link text-light" href="#">Cart🛒</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search for music!" aria-label="Search" style="width:350px;">
    </form>
  </div>
</nav>
