<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <title>Ibsar</title>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&#038;display=swap" rel="stylesheet" />
    <!-- Custom stlylesheet -->
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --> 
    <!--<link rel="shortcut icon" href="{{ asset('photos/logo.jfif') }}" type="image"> -->
</head>
<body>
    <header>
    <div class="container">
        <a href="{{ route('books')}}" class="logo">
            <img src="{{ asset('photos/app_logo.png') }}" alt="">
        </a>
        <ul class="main-nav">
            <li><a href="{{ route('book.create')}}">Create</a></li>
            <li><a href="{{ route('department')}}">Departments</a></li>
            <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
            <li><a href="{{ route('users')}}">Users</a></li>
            <li>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('policy')}}">Policy</a>
                    <a class="dropdown-item" href="{{ route('change_password') }}">Change Password</a>
                    <a class="dropdown-item" href="#" onclick="document.getElementById('logoutForm').submit()">Log Out</a>
                </div>
                <form method="post" id="logoutForm" action="{{ route('logout') }}">
                    @csrf
                </form>
            </li>
    </div>
    </header>
    @yield('content')
  
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>