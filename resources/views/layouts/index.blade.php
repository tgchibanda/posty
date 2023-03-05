<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

        @if(auth()->user())
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('getposts') }}">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">{{auth()->user()->name}}</a>
        </li>
        <li class="nav-item">
          <form action="{{ route('getout') }}" method="post" class="inline">
            @csrf
            <button class="nav-link btn btn-link">Logout</button> 
          </form>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('homeindex') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('getposts') }}">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logon') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('registration') }}">Register</a>
        </li>
        @endif
      </ul>

       
    </div>
  </div>
</nav>
    

<div class="container mt-3 p-5 my-5">
  <div class="card">
    <div class="card-body">@yield('content')</div>
  </div>
</div>

       
            
        
</body>
</html>
