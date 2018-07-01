@extends('admin.master')
@section('main-title')
 -:: All Users ::-
@endsection
@section('main-content') 
	<div class="row"> 
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" style="float: left">All admins List</h3>
             <a href="{{ route('admin_register') }}" class="btn btn-success" style="float: right">&nbsp; Add Admin</a>
              <div class="clearfix"></div>
              @if(Session::has('success'))
                <p class="alert alert-info success text-center">Admin Add successfully Complated!</p>
              @endif  
              @if(Session::has('update'))
                <p class="alert color-4 success text-center">Update successfully Complated!</p>
              @endif 
              @if(Session::has('delete'))
                <p class="alert color-5 success text-center">Delete successfully Complated!</p>
              @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" id="datatable">
              <thead>
                  <tr>
                  <th style="width: 10px">Serial</th>
                  <th>admin Name</th>
                  <th>Email</th>
                  <th>Phone</th>  
                  <th>Created Date</th>
                  <th>Manage</th> 
                </tr>
              </thead>
              <tbody>
                @php
                  $i=1;
                @endphp
                @foreach($admins as $admin)
                 <tr> 
                  <td>{{ $i++ }}</td>
                  <td>{{ $admin->first_name.' '.$admin->last_name }}</td> 
                  <td>{{ $admin->email}}</td> 
                  <td>{{ $admin->phone }}</td> 
                  <td>{{ substr($admin->created_at,0,10) }}</td>  
                  <td> 
                    <a href="{{ route('admin-view',['id'=>$admin->id]) }}"> <i class="fa fa-eye view"></i></a> 
                    <a href="{{ route('admin-edit',['id'=>$admin->id]) }}"> <i class="fa fa-edit edit"></i></a>
                    <a href="{{ route('admin-destroy',['id'=>$admin->id]) }}" onclick="return confirm('Are You Sure Delete This! ')"> <i class="fa fa-trash delete"></i></a>  
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
