@extends('admin.master') 
@section('main-title') --::show feature::--
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" style="float: left">show feature</h3>
        <a href="{{ route('features') }}" class="btn btn-success" style="float: right">all feature</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered" id="datatable">
          <tr>
            <td>feature 1</td>
            <td>:</td>
            <td>{{ $feature->cars->car_name }}</td>
          </tr>
          <tr>
            <td>feature 1</td>
            <td>:</td>
            <td>{{ $feature->feature_1 }}</td>
          </tr>
          <tr>
            <td>feature 2</td>
            <td>:</td>
            <td>{{ $feature->feature_2 }}</td>
          </tr>
          <tr>
            <td>feature 3</td>
            <td>:</td>
            <td>{{ $feature->feature_3 }}</td>
          </tr>
          <tr>
            <td>feature 4</td>
            <td>:</td>
            <td>{{ $feature->feature_4 }}</td>
          </tr>
          <tr>
            <td>feature 5</td>
            <td>:</td>
            <td>{{ $feature->feature_5 }}</td>
          </tr>
          <tr>
            <td>feature 6</td>
            <td>:</td>
            <td>{{ $feature->feature_6 }}</td>
          </tr>
          <tr>
            <td>feature 7</td>
            <td>:</td>
            <td>{{ $feature->feature_7 }}</td>
          </tr>
          <tr>
            <td>feature 8</td>
            <td>:</td>
            <td>{{ $feature->feature_8 }}</td>
          </tr>
          <tr>
            <td>create date</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($feature->created_at)->format('D jS M Y') }}</td>
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