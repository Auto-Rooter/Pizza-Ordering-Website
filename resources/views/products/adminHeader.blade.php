<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" href="{{ URL::to('dashboard.png') }}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/1041157948.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ URL::to('css/AdminHeader.css') }}">
  </head>

<body>
<nav class="navbar is-primary">
    <div class="container">
        <div class="navbar-brand">
            <a href="#" class="navbar-item" style="font-weight:bold;">
                <i class="fas fa-chart-pie" style="margin-right:6px"></i> Admin Dashboard {{ Auth::user() ? '('.Auth::user()->name.')' : ''  }} 
            </a>
            <span class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>

        <div id="navMenu" class="navbar-menu">
            <div class="navbar-end">
            @if(Auth::user())
                <a href="{{ url('/orders') }}" class="navbar-item "> Orders </a>
                <a href="{{ route('dashboard.index') }}" class="navbar-item "> Products </a>
                <a href="{{ url('/logout') }}" class="navbar-item "> Logout </a>
            @else
                <a href="{{ url('/login') }}" class="navbar-item "> Login </a>
            @endif 

            </div>
        </div>
    </div>
</nav>
<script type="text/javascript">
    (function() {
        var burger = document.querySelector('.burger');
        var nav = document.querySelector('#'+burger.dataset.target);

        burger.addEventListener('click', function(){
            burger.classList.toggle('is-active');
            nav.classList.toggle('is-active');
        });
    })(); 
</script>
 




<div id="app">
 
            @yield('content')
 
</div>
</body>
<!-- 
<footer class="page-footer font-small bg-dark" id="footer1">
<div class="content has-text-centered" style="margin-top: 18px;">
    <p>
      <strong>Pizzas Land</strong> by <a href="https://github.com/Auto-Rooter">Hadi Assalem</a> © 2020 Copyright
    </p>
  </div>
</footer> -->



</html>















