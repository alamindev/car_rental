@extends('admin.master') 
@section('main-title') --::show facility::--
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" style="float: left">show facility</h3>
        <a href="{{ route('facilities') }}" class="btn btn-success" style="float: right">all facilities</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered" id="datatable">
          <tr>
            <td>facility FontAwesome Icon</td>
            <td>:</td>
            <td>
              <i style="font-size: 50px;" class="{{ $facility->icon }}"></i>
            </td>
          </tr>
          <tr>
            <td>facility Title</td>
            <td>:</td>
            <td>{{ $facility->title }}</td>
          </tr>
          <tr>
            <td>facility detail's</td>
            <td>:</td>
            <td>{!! $facility->detail !!}</td>
          </tr>
          <tr>
            <td>create date</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($facility->created_at)->format('D jS M Y') }}</td>
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