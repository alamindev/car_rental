@extends('admin.master') 
@section('main-title') --::edit rating::--
@endsection
 
@section('main-content')
<form role="form" action="{{ route('rating-update',$edit->id) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title pull-left">Edit rating</h3>
          <a href="{{ route('rating') }}" class="btn btn-info pull-right"> <i class="fa fa-backward "></i> back</a>
        </div>
        <div class="clearfix"></div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
                  <label for="title">Rating Title <span class="text-danger">*</span></label>
                  <input type="text" name='title' class="form-control" id="title" value="title">
                  <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('parcent') ? 'is-invalid' : '' }}">
                  <label for="parcent">Rating Parcentense <span class="text-danger">*</span></label>
                  <input type="text" name='parcent' class="form-control" id="parcent" value="{{ $edit->parcent }}">
                  <span class="text-danger">{{ $errors->has('parcent') ? $errors->first('parcent') : '' }}</span>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-secondary" value="Update rating">
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