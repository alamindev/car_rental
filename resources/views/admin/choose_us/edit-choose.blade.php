@extends('admin.master') 
@section('main-title') --::Update Choose::--
@endsection
 
@section('main-content')
<form role="form" action="{{ route('update-choose') }}" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title pull-left">Update Choose</h3>
        </div>
        <div class="clearfix"></div>
        <div class="box-body">
          @if(Session::has('message'))
          <p class="alert alert-success message text-center">Choose Add successfully Complated!</p>
          @endif @if(Session::has('update'))
          <p class="alert alert-primary update text-center">Choose Update Successfully Complated!</p>
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
                <div class="form-group {{ $errors->has('detail') ? 'is-invalid' : '' }}">
                  <label for="editor">Write detail's</label>
                  <textarea id="editor" name="detail" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $edit->detail }}</textarea>
                  <span class="text-danger">{{ $errors->has('detail') ? $errors->first('detail') : '' }}</span>
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
<script src="{{ asset('admin-asset') }}/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    CKEDITOR.replace('editor');  
    setTimeout(function(){
      $('.message').fadeOut(1000);
    },1000);    
    setTimeout(function(){
      $('.update').fadeOut(1000);
    },1000);    
  });

</script>
@endsection