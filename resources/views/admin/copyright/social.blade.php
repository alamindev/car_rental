@extends('admin.master')
@section('main-title')
	--::Copy right text::--
@endsection
@section('main-content') 
	<div class="row">
        <div class="col-md-4"> 
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Add Copyright Text</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
             <form role="form" action="{{ route('store-copyright') }}" method="post">
              {{ csrf_field() }}
              <div class="box-body">
              @if(session('message'))
               <div id="message" class="alert alert-success">{{ session('message') }}</div>
              @endif
                <div class="form-group {{ $errors->has('copyright') ? 'is-invalid' : '' }}">
                  <label for="copyright">copyright<span class="text-danger">*</span></label>
                  <input type="text" name='copyright' class="form-control" id="copyright" placeholder="Enter Your copyright url">
                  <span class="text-danger">{{ $errors->has('copyright')? $errors->first('copyright'): '' }}</span>
                </div>  
              </div> 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add copyright</button>
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
              <h3 class="box-title">Update Copyright</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
              @if(session('message'))
               <div id="message" class="alert alert-success">{{ session('message') }}</div>
              @endif
                <div class="form-group">
                  <label for="copyright">copyright<span class="text-danger">*</span></label>
                  <input type="text" name='copyright' disabled class="form-control" id="copyright" value=" "> 
                </div>  
              </div> 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" disabled>Updated copyright</button>
              </div>
            </form> 
            </div> 
          </div>
        </div> 
    </div>
@endsection
@section('script')
<script type="text/javascript">
  $(function(){ 
      setTimeout(function(){
        $('#message').fadeOut('slow');
      },2000);
  });
</script>
@endsection
