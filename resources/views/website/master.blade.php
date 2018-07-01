<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="This is a boilerplate for a Bootstrap 4.0.0 project">
  <meta name="keywords" content="HTML, CSS, JS, Sass, JavaScript, framework, bootstrap, front-end, frontend, web development">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="alamin">
  <title>@yield('title')</title>
  <!-- build:css -->
  <link rel="stylesheet" href="{{ asset('website-asset') }}/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('website-asset') }}/assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="{{ asset('website-asset') }}/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{ asset('website-asset') }}/assets/css/animate.css">
  <link rel="stylesheet" href="{{ asset('website-asset') }}/assets/css/hover-min.css">
  <link rel="stylesheet" href="{{ asset('website-asset') }}/assets/css/jquery.fancybox.min.css"> @yield('style')
  <link rel="stylesheet" href="{{ asset('website-asset') }}/assets/css/slick.css">
  <link rel="stylesheet" href="{{ asset('website-asset') }}/assets/css/slick-theme.css">
  <link rel="stylesheet" href="{{ asset('website-asset') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ asset('website-asset') }}/assets/css/responsive.css">
  <!-- endbuild -->
</head>

<body>
  @include('website.includes.header') @yield('main-content')
  @include('website.includes.footer')
  <!-- build:js -->
  <script src="{{ asset('website-asset') }}/assets/js/vendor/jquery-3.2.1.slim.min.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/jquery-1.10.2.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/bootstrap.min.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/vendor/popper.min.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/jquery.easing.1.3.min.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/jquery.counterup.min.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/jquery.appear.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/parallax.min.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/wow.min.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/jquery.fancybox.min.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/owl.carousel.min.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/slick.min.js"></script>
  <script src="{{ asset('website-asset') }}/assets/js/main.js"></script>
  @yield('script')
  <!-- endbuild -->
</body>

</html>