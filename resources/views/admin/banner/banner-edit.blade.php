@extends('admin.master')
@section('main-title')
	--::Update Logo And Title::--
@endsection
@section('main-content') 
	<div class="row">
           <div class="col-md-4"> 
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Edit Banner</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
             <form role="form" action="{{ route('update-banner',$edit->id) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
              @if(session('message'))
               <div id="message" class="alert alert-success">{{ session('message') }}</div>
              @endif 
                <div class="form-group">
                  <label for="image">banner</label>
                   <input type="file" name="banner"> 
                </div>    
                <div class="form-group"> 
                   <img src="{{ asset('uploads/banner/'.$edit->banner) }}" class="img-responsive" width="290" alt="avatar">
                </div> 
              </div> 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Banner</button>
              </div>
            </form> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --> 
        </div>
        <!-- /.col (left) -->  
        <div class="col-md-8">
          <div class="box  box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Banner</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" id="datatable"> 
                <thead>
                  <tr>
                    <th style="width: 10px">Serial</th> 
                    <th>banner</th>
                    <th>Manage</th> 
                   </tr>
                </thead>
                <tbody>
                  @php 
                   $i= 1;
                  @endphp
                  @foreach($banner as $data) 
                  <tr>
                    <td>{{ $i++ }}</td>  
                    <td>
                      @if(!$data->banner == '')
                          <img src="{{ asset('uploads/banner/'.$data->banner) }}" width="40" alt="logo">
                      @else
                          <img src="{{ asset('uploads/banner/banner.jpg') }}" width="40" alt="avatar">
                      @endif
                    </td>
                    <td>
                        <a href="{{ route('show-banner',['id'=>$data->id]) }}"> <i class="fa fa-eye view"></i></a>
                        <a href="{{ route('edit-banner',['id'=>$data->id]) }}"> <i class="fa fa-edit edit"></i></a>
                        <a href="{{ route('destroy-banner',['id'=>$data->id]) }}" onclick="return confirm('Are You Sure Delete This! ')"> <i class="fa fa-trash delete"></i></a>
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
  $(function(){
      $('#datatable').DataTable();
      setTimeout(function(){
        $('#message').fadeOut('slow');
      },2000);
  });
</script>
@endsection
