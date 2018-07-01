@extends('admin.master') 
@section('main-title') --::edit review::--
@endsection
 
@section('main-content')
<form role="form" action="{{ route('review-update',$edit->id) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title pull-left">Edit review</h3>
          <a href="{{ route('reviews') }}" class="btn btn-info pull-right"> <i class="fa fa-backward "></i> back</a>
        </div>
        <div class="clearfix"></div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
                  <label for="title">review Title <span class="text-danger">*</span></label>
                  <input type="text" name='title' class="form-control" id="title" value="{{ $edit->title }}">
                  <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('detail') ? 'is-invalid' : '' }}">
                  <label for="editor">Write detail</label>
                  <textarea id="editor" name="detail" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $edit->detail }}</textarea>
                  <span class="text-danger">{{ $errors->has('detail') ? $errors->first('detail') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                  <label for="name">Customer Name<span class="text-danger">*</span></label>
                  <input type="text" name='name' class="form-control" id="name" value="{{ $edit->name }}">
                  <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('photo') ? 'is-invalid' : '' }}">
                  <label for="photo">Customer Photo<span class="text-danger">*</span></label>
                  <input type="file" name='photo'>
                  <span class="text-danger">{{ $errors->has('photo') ? $errors->first('photo') : '' }}</span>
                </div>
                <div class="form-group">
                  <label for="photo"> Photo</label>
                  <img src="{{ asset('uploads/review/'.$edit->photo) }}" class="img-responsive" alt="">
                </div>
                <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                  <label for="address">Customer Address<span class="text-danger">*</span></label>
                  <input type="text" name='address' class="form-control" id="address" value="{{ $edit->address }}">
                  <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-secondary" value="Update review">
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
  });

</script>
@endsection