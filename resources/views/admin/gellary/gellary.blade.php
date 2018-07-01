@extends('admin.master')
@section('main-title')
  --::Photo Gellary::--
@endsection
@section('style')
  <link rel="stylesheet" href="{{ asset('admin-asset') }}/dist/css/jquery.fancybox.css">
@endsection 
@section('main-content') 
	<div class="row">
        <div class="col-md-3"> 
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Add New Photo</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
             <form role="form" action="{{ route('gellary-store') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
              @if(session('message'))
               <div id="message" class="alert alert-success">{{ session('message') }}</div>
              @endif 
                <div class="form-group">
                  <label for="image">Photo</label>
                   <input type="file" name="photo">
                   <span class="text-danger">{{ $errors->has('photo')? $errors->first('photo'): '' }}</span>
                </div>    
              </div> 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Photo</button>
              </div>
            </form> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --> 
        </div>
        <!-- /.col (left) -->  
        <div class="col-md-9">
          <div class="box  box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Photo Gellary List</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                  @if(\Session::has('delete'))
                    <div class="alert alert-danger text-center" style="width: 90%; margin: 0 auto;" id="delete">Photo deleted successfully!</div>
                  @endif
                  @foreach($gellaries as $gallary)
                  <div class="col-md-3" style="margin-bottom: 15px;">
                    <ul class="list-group"> 
                      <li class="list-group-item">
                         <img src="{{ asset('uploads/gellary/'.$gallary->photo) }}" style="width: 300px; height: 150px;" class="img-responsive">
                      </li>
                      <li class="list-group-item text-center">
                        <a href="{{ asset('uploads/gellary/'.$gallary->photo) }}" class="view_fancy"> <i class="fa fa-eye view" style="margin-right: 15px;"></i></a> 
                          @foreach(auth::user()->roles as $role) 
                      @if($role->name = 'SupperAdmin')
                            <a href="{{ route('gellary-destroy',['id'=>$gallary->id]) }}" onclick="return confirm('Are You Sure Delete This! ')"> <i class="fa fa-trash delete"></i></a>
                       @endif 
                       @endforeach
                     
                      </li>
                    </ul>
                  </div>  
                  @endforeach 
                </div>   
            </div> 
          </div>
        </div> 
    </div>
@endsection
@section('script')
<script src="{{ asset('admin-asset') }}/dist/js/jquery.fancybox.pack.js"></script> 
<script type="text/javascript">
  $(function(){ 
      setTimeout(function(){
        $('#message').fadeOut('slow');
      },2000);  
      setTimeout(function(){
        $('#delete').fadeOut('slow');
      },2000);
        $(".view_fancy").fancybox({
            fitToView: true, // avoids scaling the image to fit in the viewport 
          });
  });
</script>
@endsection
