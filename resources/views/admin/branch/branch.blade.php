@extends('admin.master') 
@section('main-title') -::Branchs ::-
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" style="float: left">All Branch List</h3>
        <a href="{{ route('branch-create') }}" class="btn btn-success" style="float: right">&nbsp;Add branch</a>
        <div class="clearfix"></div>
        @if(Session::has('success'))
        <p class="alert alert-info success text-center">Branch Add successfully Complated!</p>
        @endif @if(Session::has('update'))
        <p class="alert color-4 success text-center">Update successfully Complated!</p>
        @endif @if(Session::has('delete'))
        <p class="alert color-5 success text-center">Delete successfully Complated!</p>
        @endif
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered" id="datatable">
          <thead>
            <tr>
              <th style="width: 10px">Serial</th>
              <th>Branch Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Created Date</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; 
@endphp @foreach($branchs as $branch)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $branch->branch_name }}</td>
              <td>{{ $branch->email}}</td>
              <td>{{ $branch->phone }}</td>
              <td>{{ substr($branch->created_at,0,10) }}</td>
              <td> 
                <a href="{{ route('branch-view',['id'=>$branch->id]) }}"> <i class="fa fa-eye view"></i></a> 
                <a href="{{ route('branch-edit',['id'=>$branch->id]) }}"> <i class="fa fa-edit edit"></i></a>
                <a href="{{ route('branch-destroy',['id'=>$branch->id]) }}" onclick="return confirm('Are You Sure Delete This! ')"> <i class="fa fa-trash delete"></i></a>        
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
      $('.success').fadeOut(1000);
    },2000);
  });

</script>
@endsection