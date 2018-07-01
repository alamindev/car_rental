<!-- Content Header (Page header) -->
<section class="content-header" style="margin-bottom: 20px;">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">

      <?php $segments = ''; ?> @foreach(Request::segments() as $segment)
      <?php $segments .= '/'.$segment; ?>

      <a href="{{ $segments }}">{{$segment}}</a> @endforeach
    </li>
  </ol>
</section>