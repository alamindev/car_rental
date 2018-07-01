@extends('admin.master') 
@section('main-title') --::add new Facility::--
@endsection
 
@section('main-content')
<form role="form" action="{{ route('facility-add') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title pull-left">Add new facility</h3>
          <a href="{{ route('facilities') }}" class="btn btn-info pull-right"> <i class="fa fa-backward "></i> back</a>
        </div>
        <div class="clearfix"></div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <div class="form-group {{ $errors->has('icon') ? 'is-invalid' : '' }}">
                  <label for="icon">facility Icon<span class="text-danger">*</span></label>
                  <input type="text" name='icon' class="form-control" id="icon" placeholder="Write a facility icon" value="{{ old('icon') }}">
                  <span class="text-danger">{{ $errors->has('icon') ? $errors->first('icon') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
                  <label for="title">facility Title <span class="text-danger">*</span></label>
                  <input type="text" name='title' class="form-control" id="title" placeholder="Write a facility title">
                  <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                </div>

                <div class="form-group {{ $errors->has('detail') ? 'is-invalid' : '' }}">
                  <label for="editor">Write detail's</label>
                  <textarea id="editor" name="detail" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  <span class="text-danger">{{ $errors->has('detail') ? $errors->first('detail') : '' }}</span>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-warning" value="Add facility">
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