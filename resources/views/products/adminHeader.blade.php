<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/1041157948.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ URL::to('css/adminHeader.css') }}">
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
 


    <!-- <nav class="navbar is-transparent">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="{{ URL::to('/images/logo2.png') }}" alt="..." width="40" height="100">
    </a>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">


      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">
          </p>
          <p class="control" style="margin-right: 25px;">
          <a  href="">
              <span class="icon"  style="color:#00c4a7" >
                    <i class="fas fa-shopping-basket is-large fas fa-2x" style="margin-right: 4px;"></i>
                    <span class="tag is-info is-normal is-light" style="border-radius: 25px;">2</span>
              </span>
            </a>  

          </p>
        </div>
      </div>
    </div>
  </div>
</nav> -->



<div id="app">
 
            @yield('content')
 
</div>
</body>
</html>















