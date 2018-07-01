@extends('admin.master')
@section('main-title')
	--::Change Logo And Title::--
@endsection
@section('main-content') 
	<div class="row">
        <div class="col-md-4"> 
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Add New Logo</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
             <form role="form" action="{{ route('post-logoandtitle') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
              @if(session('message'))
               <div id="message" class="alert alert-success">{{ session('message') }}</div>
              @endif
                <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
                  <label for="title">Header Title<span class="text-danger">*</span></label>
                  <input type="text" name='title' class="form-control" id="title" placeholder="Enter Your header title">
                  <span class="text-danger">{{ $errors->has('title')? $errors->first('title'): '' }}</span>
                </div>
                <div class="form-group">
                  <label for="image">Images</label>
                   <input type="file" name="logo">
                   <span class="text-danger">{{ $errors->has('logo')? $errors->first('logo'): '' }}</span>
                </div>    
                <div class="form-group"> 
                   <img src="{{ asset('uploads/avatar_1.png') }}" width="200" alt="avatar">
                </div> 
              </div> 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Title & Logo</button>
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
              <h3 class="box-title">Logo and title list</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 @if(session('delete'))
               <div id="message" class="alert alert-danger">{{ session('delete') }}</div>
              @endif
              <table class="table table-bordered" id="datatable">
                <thead>
                  <tr>
                    <th style="width: 10px">Serial</th>
                    <th>title</th>
                    <th>Logo</th>
                    <th>Manage</th> 
                   </tr>
                </thead>
                <tbody>
                  @php 
                   $i= 1;
                  @endphp
                  @foreach($logoTitle as $data)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->title }}</td> 
                    <td>
                      @if(!$data->logo == '')
                          <img src="{{ asset('uploads/logo/'.$data->logo) }}" width="40" alt="logo">
                      @else
                          <img src="{{ asset('uploads/avatar_1.png') }}" width="200" alt="avatar">
                      @endif
                    </td>
                    <td>
                        <a href="{{ route('show-logoandtitle',['id'=>$data->id]) }}"> <i class="fa fa-eye view"></i></a>
                          @foreach(auth::user()->roles as $role) 
                      @if($role->name = 'SupperAdmin')
                          <a href="{{ route('edit-logoandtitle',['id'=>$data->id]) }}"> <i class="fa fa-edit edit"></i></a>
                        <a href="{{ route('destroy-logoandtitle',['id'=>$data->id]) }}" onclick="return confirm('Are You Sure Delete This! ')"> <i class="fa fa-trash delete"></i></a>
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
  $(function(){
      $('#datatable').DataTable();
      setTimeout(function(){
        $('#message').fadeOut('slow');
      },2000);
  });
</script>
@endsection
