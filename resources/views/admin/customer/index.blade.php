@extends('admin.master') 
@section('main-title') -:: All Customer ::-
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" style="float: left">All admins List</h3>
        @if(Session::has('delete'))
        <p class="alert color-5 deletes text-center">Delete successfully Complated!</p>
        @endif
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered" id="datatable">
          <thead>
            <tr>
              <th style="width: 10px">Serial</th>
              <th>Customer Name</th>
              <th>Customer Id</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Created Date</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; 
@endphp @foreach($customers as $data)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $data->first_name.' '.$data->last_name }}</td>
              <td>00{{ $data->id}}</td>
              <td>{{ $data->email}}</td>
              <td>{{ $data->phone }}</td>
              <td>{{ substr($data->created_at,0,10) }}</td>
              <td>
                <a href="{{ route('customer-view',['id'=>$data->id]) }}"> <i class="fa fa-eye view"></i></a>
                <a href="{{ route('customer-destroy',['id'=>$data->id]) }}" onclick="return confirm('Are You Sure Delete This! ')"> <i class="fa fa-trash delete"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('script')
<script type="text/javascript">
  $(function () { 
    $('#datatable').DataTable( );
    setTimeout(function(){
      $('.deletes').fadeOut(1000);
    },2000);
  });

</script>
@endsection