<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('main-title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf_token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/dist/css/AdminLTE.min.css"> 
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/dist/css/skins/_all-skins.min.css">
   @yield('style')
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/iCheck/flat/blue.css"> 
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/datatables/dataTables.bootstrap.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/daterangepicker/daterangepicker.css"> 
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/dist/css/custom.css">
 
</head>
<body class="skin-blue sidebar-mini wysihtml5-supported fixed  ">
 
<div class="wrapper">
 @include('admin.includes.header')
 @include('admin.includes.sidebar') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     @include('admin.includes.bread') 
    <!-- Main content -->
    <section class="content">
      @yield('main-content')
    </section>
    <!-- /end main content -->
  </div>  
  @include('admin.includes.footer') 
  @include('admin.includes.control-sidebar') 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('admin-asset') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('admin-asset') }}/bootstrap/js/bootstrap.min.js"></script> 
<script src="{{ asset('admin-asset') }}/plugins/sparkline/jquery.sparkline.min.js"></script>  
<script src="{{ asset('admin-asset') }}/plugins/knob/jquery.knob.js"></script>  
<script src="{{ asset('admin-asset') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{ asset('admin-asset') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin-asset') }}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('admin-asset') }}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{ asset('admin-asset') }}/plugins/timepicker/bootstrap-timepicker.min.js"></script>
@yield('script') 
<script src="{{ asset('admin-asset') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>  
<script src="{{ asset('admin-asset') }}/plugins/fastclick/fastclick.js"></script> 
<script src="{{ asset('admin-asset') }}/dist/js/app.min.js"></script> 
<script src="{{ asset('admin-asset') }}/dist/js/pages/dashboard.js"></script>  
<script src="{{ asset('admin-asset') }}/dist/js/demo.js"></script> 
<script type="text/javascript">
var links = document.querySelectorAll('.treeview a[href="'+document.URL+'"]');
for (var i = 0; i < document.links.length; i++) {
    if (document.links[i].href == document.URL) {
        document.links[i].className = 'active';
    }
}
$(function(){
$(window).load(function() {
    $(".preloader").fadeOut("slow");
  });
});
</script> 
</body>
</html>
