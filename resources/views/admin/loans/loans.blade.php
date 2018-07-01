@extends('admin.master')
@section('main-title')
--::loans::--
@endsection
@section('main-content') 
  <div class="row"> 
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" style="float: left">All Loans List</h3>
             <a href="{{ route('loan-add') }}" class="btn btn-success" style="float: right">add loan</a>
            </div>
            <div class="clearfix"></div>
             @if(Session::has('message'))
                <p class="alert alert-success message text-center">loan Add successfully Complated!</p>
              @endif     
              @if(Session::has('update'))
                <p class="alert alert-primary update text-center">loan Update Successfully Complated!</p>
              @endif 
               @if(Session::has('error'))
                <p class="alert alert-primary update text-center">{{ session::has('error') }}</p>
              @endif    
              @if(Session::has('delete'))
                <p class="alert alert-danger deleted text-center">delete Deleted Seccessfull!</p>
              @endif  
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" id="datatable">
              <thead>
                  <tr>
                  <th style="width: 10px">Serial</th>
                  <th>loan title</th>
                  <th>icon</th>
                  <th>loan Detail's</th> 
                  <th>create Date</th>
                  <th>Manage</th> 
                </tr>
              </thead>
              <tbody>
                    @php 
                   $i = 1;
                  @endphp
                @foreach($loans as $data)
                <tr> 
                  <td>{{ $i++ }}</td>
                  <td>{{ $data->title }}</td> 
                  <td>{{ $data->icon }}</td> 
                  <td>{!! substr($data->detail,0,50) !!}</td>  
                  <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-y') }}</td>
                  <td width="100">
                    <a href="{{ route('loan-show',["id"=>$data->id ]) }}" class="text-success"> <i class="fa fa-eye view"></i></a>
                      @foreach(auth::user()->roles as $role) 
                      @if($role->name = 'SupperAdmin')
                       <a href="{{ route('loan-edit',['id'=>$data->id]) }}"> <i class="fa fa-edit edit"></i></a>
                    <a href="{{ route('loan-destroy',['id'=>$data->id]) }}" onclick="return confirm('Are You Sure Delete This! ')"> <i class="fa fa-trash delete"></i></a> 
                      @endif 
                   @endforeach
                   
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
      $('.message').fadeOut(1000);
    },1000); 
    setTimeout(function(){
      $('.update').fadeOut(1000);
    },1000);   
   setTimeout(function(){
      $('.deleted').fadeOut(1000);
    },1000);
  });

</script>
@endsection
