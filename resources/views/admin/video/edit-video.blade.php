@extends('admin.master') 
@section('main-title') --::Update video::--
@endsection
 
@section('main-content')
<form role="form" action="{{ route('update-video') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title pull-left">Update video</h3>
        </div>
        <div class="clearfix"></div>
        <div class="box-body">
          @if(Session::has('message'))
          <p class="alert alert-success message text-center">video Add successfully Complated!</p>
          @endif @if(Session::has('update'))
          <p class="alert alert-primary update text-center">video Update Successfully Complated!</p>
          @endif
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
                  <label for="title">title<span class="text-danger">*</span></label>
                  <input type="text" name='title' class="form-control" id="title" value="{{ $edit->title }}">
                  <input type="hidden" name='id' value="{{ $edit->id }}">
                  <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('subtitle') ? 'is-invalid' : '' }}">
                  <label for="subtitle">subtitle<span class="text-danger">*</span></label>
                  <input type="text" name='subtitle' class="form-control" id="subtitle" value="{{ $edit->subtitle }}">
                  <span class="text-danger">{{ $errors->has('subtitle') ? $errors->first('subtitle') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('link') ? 'is-invalid' : '' }}">
                  <label for="link">video link<span class="text-danger">*</span></label>
                  <input type="text" name='link' class="form-control" id="link" value="{{ $edit->link }}">
                  <span class="text-danger">{{ $errors->has('link') ? $errors->first('link') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('photo') ? 'is-invalid' : '' }}">
                  <label for="photo">photo<span class="text-danger">*</span></label>
                  <input type="file" name='photo' class="form-control">
                  <span class="text-danger">{{ $errors->has('photo') ? $errors->first('photo') : '' }}</span>
                  <small class="text-danger">photo size: - width: 1440, and height:760</small>
                </div>
                <div class="form-group">
                  <label for="photo">photo</label>
                  <img src="{{ asset('uploads/video/'.$edit->photo) }}" alt="" class="img-responsive">

                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-info" value="Update">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</form>
@endsection
 
@section('script')
<script type="text/javascript">
  $(document).ready(function(){ 
    setTimeout(function(){
      $('.message').fadeOut(1000);
    },1000);    
    setTimeout(function(){
      $('.update').fadeOut(1000);
    },1000);    
  });

</script>
@endsection