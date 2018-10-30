<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:700');
    .jumbotron{
        /* background-image:url({{url('images/wallpaper.jpg')}}) */
    }
    .jumbotron {
        min-height: 200px !important;
        background-color: rgba(56, 55, 89, 0.4);
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        text-align: center;
    }
    .card, .card-header {
        font-family: 'Montserrat', sans-serif;
        border: none !important;
        background-color: #1e202f;
        
    }
    .card-header {
        letter-spacing: 1px;
            padding: 27px 23px;
            border-radius: 4px 4px 0 0;
    }
     thead th{
        border-top: none !important;
        border-bottom: 0.5px solid rgba(255, 255, 255, 0.7) !important;
    }
     th, td, tr  {
        border-color: rgba(255, 255, 255, 0.2) !important;
        color: white;
        background-color: rgba(56, 55, 89, 0.5) !important;
    }
    .border {
        border-left: 6px solid #f92552 !important;
        font-weight: bold;
        color: white;
        background-color: #383759;
    }
    .border-green {
        border-left: 6px solid #3ffeca !important;
        font-weight: bold;
        color: white;
        background-color: #383759;
    }
    .border-yellow {
        border-left: 6px solid yellow !important;
        font-weight: bold;
        color: white;
        background-color: #383759;
    }
    th {
        font-size: 11px;
    }
    td {
        vertical-align: none !important;
        font-size: 10px;
        
    }
    h1 {
        color: #E8C547;
        font-weight: bold;
        font-size: 3em;
    }
    h2 {
        font-weight: bold;
        color: #E8C547;
        opacity: 0.8;
        font-size: 1.5em;
    }
    body {
        background-color:#1e202f   !important;
    }
    nav {
        font-family: 'Montserrat', sans-serif !important;
        font-size: 10px !important;
        background-color: #383759 !important;
    }
    nav li, nav ul, nav a {
        font-size: 13px !important;
        color: white !important;
        font-weight: bold;
    }
    p {
        font-size: 1.1em;
        color: #E8C547 !important;
        font-weight:bold;
    }
    nav {
        box-shadow: none !important;
    }
    .team,
    span {
      color: #E8C547;
      list-style-type: none;
      font-weight: bold;
    }
    .team {
        width: 60%;
    }
    .specific-match-table {
      box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
      padding: 50px;
      background-color: #0D1B1E;
      border-radius: 7px;
       border: 3px solid #E8C547 ; 
      width: 100%;
    }
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    .form-group {
      text-align: center;
    }
    .form-group * {
      display: inline-block;
    }
    .table td, .table th {
        vertical-align: middle !important;
    }
    input[type="number"] {
      -moz-appearance: textfield;
      text-align: center;
     background-color: #383759 !important;
     color: white;
     border: 0.5px solid white;
    }
    input[type="number"]:focus {
     background-color: #0D1B1E;
     color: white;
    }
    input[type="number"]::placeholder {
        color: white;
    }
    .vs {
      padding-top: 5px;
      margin: 0 10px;
    }
    .team p {
      margin: 0;
    }
    .prediction-group {
        display:inline-block;
        border-radius: 7px;
        color: white;
        font-weight: bold;
        list-style-type: none;
        padding: 25px;
        border: 2px solid #E8C547;
    }
    .submit-btn {
        border-radius: 27px;
        padding: 10px 20px;
        background-color:#383759 ;
        color: white;
        border: 3px solid #383759;
        cursor: pointer;
        font-size: 0.8em;
        letter-spacing: 1px;
        font-weight: bold;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" style="color:#3ffeca !important; font-size: 23px !important;" href="{{ url('/') }}">
                   Winner
                </a>
                <a class="navbar-brand" href="{{ url('/live') }}">
                   Live
                </a>
                <a class="navbar-brand" href="{{ url('/predictions') }}">
                   Predictions
                </a>
                <a class="navbar-brand" href="{{ url('/live') }}">
                   History
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
