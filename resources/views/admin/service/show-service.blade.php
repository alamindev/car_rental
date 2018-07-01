@extends('admin.master') 
@section('main-title') --::show service::--
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" style="float: left">show service</h3>
        <a href="{{ route('services') }}" class="btn btn-success" style="float: right">all services</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered" id="datatable">
          <tr>
            <td>Service FontAwesome Icon</td>
            <td>:</td>
            <td>
              <i style="font-size: 50px;" class="{{ $service->icon }}"></i>
            </td>
          </tr>
          <tr>
            <td>service Title</td>
            <td>:</td>
            <td>{{ $service->title }}</td>
          </tr>
          <tr>
            <td>service detail's</td>
            <td>:</td>
            <td>{!! $service->detail !!}</td>
          </tr>
          <tr>
            <td>create date</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($service->created_at)->format('D jS M Y') }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('script')
<script type="text/javascript">

</script>
@endsection