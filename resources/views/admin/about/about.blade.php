@extends('admin.master')
@section('main-title')
  --::About::--
@endsection
@section('main-content') 
  <div class="row"> 
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" style="float: left">About</h3> 
            </div>
            <div class="clearfix"></div>
             @if(Session::has('message'))
                <p class="alert alert-success message text-center">About Add successfully Complated!</p>
              @endif     
              @if(Session::has('update'))
                <p class="alert alert-primary update text-center">About Update Successfully Complated!</p>
              @endif    
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" id="datatable">
              <thead>
                  <tr>
                  <th style="width: 10px">Serial</th>
                  <th>about Title</th> 
                  <th>about Detail's</th>  
                  <th>about Date</th>
                  <th>Manage</th> 
                </tr>
              </thead>
              <tbody>
                    @php 
                   $i = 1;
                  @endphp 
                <tr> 
                  <td>{{ $i++ }}</td>
                  <td>{{ $about->title }}</td> 
                  <td>{!!  substr($about->detail,0,50) !!}</td>  
                  <td>{{ Carbon\Carbon::parse($about->created_at)->format('d-m-y') }}</td>
                  <td width="100">
                    <a href="{{ route('show-about',["id"=>$about->id ]) }}" class="text-success"> <i class="fa fa-eye view"></i></a>
                    <a href="{{ route('edit-about',['id'=>$about->id]) }}"> <i class="fa fa-edit edit"></i></a> 
                  </td>
                </tr> 
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
  });
</script>
@endsection
