<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="{{ URL::to('ssss.png') }}">
    <title>Pizza :)</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::to('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/animate.css') }}">
    
    <link rel="stylesheet"  href="{{ URL::to('css/owl.carousel.min.css') }}" >
    <link rel="stylesheet" href="{{ URL::to('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet"  href="{{ URL::to('css/magnific-popup.css') }}" >

    <link rel="stylesheet"  href="{{ URL::to('css/aos.css') }}" >

    <link rel="stylesheet"  href="{{ URL::to('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ URL::to('css/flaticon.css') }}" >
    <link rel="stylesheet" href="{{ URL::to('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}" >




</head>
<body>
@include('_header_cart')
<div class="container page">
    @yield('content')
</div>

@yield('scripts')

</body>

<footer class="page-footer font-small bg-dark" id="footer1">

  <div class="footer-copyright text-center py-3" style="color:#ffff">© 2020 Pizzas Land Copyright  </div>

</footer>

</html>