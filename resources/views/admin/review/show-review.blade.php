@extends('admin.master') 
@section('main-title') --::show review::--
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" style="float: left">show review</h3>
        <a href="{{ route('reviews') }}" class="btn btn-success" style="float: right">all Reviews</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered" id="datatable">
          <tr>
            <td>review Title</td>
            <td>:</td>
            <td>{{ $review->title }}</td>
          </tr>
          <tr>
            <td>review name</td>
            <td>:</td>
            <td>{{ $review->name }}</td>
          </tr>
          <tr>
            <td>review Address</td>
            <td>:</td>
            <td>{{ $review->address }}</td>
          </tr>
          <tr>
            <td>review detail</td>
            <td>:</td>
            <td>{!! $review->detail !!}</td>
          </tr>
          <tr>
            <td>photo</td>
            <td>:</td>
            <td>
              <img src="{{ asset('uploads/review/'.$review->photo) }}" class="img-responsive" alt="">
            </td>
          </tr>
          <tr>
            <td>create date</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($review->created_at)->format('D jS M Y') }}</td>
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