<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('stylesheets/util.css')  }}">

    <link rel="stylesheet" href="{{ asset('stylesheets/form.css') }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/bootstrap.min.css')  }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('stylesheets/font-awesome.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('stylesheets/owl.carousel.css')  }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/style.css')  }}">
    <link rel="stylesheet" href="{{ asset('stylesheets/responsive.css')  }}">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <title>Laravel</title>

</head>
<body>

@yield('content')
</body>

<script src="https://code.jquery.com/jquery.min.js"></script>
<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- jQuery sticky menu -->
<script src="{{ asset('js/javascripts/owl.carousel.min.js')  }}"></script>
<script src="{{ asset('js/javascripts/jquery.sticky.js')  }}"></script>
<!-- jQuery easing -->
<script src="{{ asset('js/javascripts/jquery.easing.1.3.min.js')  }}"></script>
<!-- Main Script -->

<script src="{{asset('js/main.js')}}"></script>
<script src="{{ asset('js/javascripts/form.js')  }}"></script>
<!-- Slider -->
<script type="text/javascript" src="javascripts/bxslider.min.js"></script>
<script type="text/javascript" src="javascripts/script.slider.js"></script>
</html>
