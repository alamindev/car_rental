@extends('admin.master') 
@section('main-title') --::Add term and condition::--
@endsection
 
@section('main-content')
<form role="form" action="{{ route('store-term') }}" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title pull-left">Add term and condition</h3>
        </div>
        <div class="clearfix"></div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
                  <label for="title">title<span class="text-danger">*</span></label>
                  <input type="text" name='title' class="form-control" id="title" placeholder="Write a service title" value="{{ old('title') }}">
                  <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('detail') ? 'is-invalid' : '' }}">
                  <label for="editor">Write detail's</label>
                  <textarea id="editor" name="detail" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  <span class="text-danger">{{ $errors->has('detail') ? $errors->first('detail') : '' }}</span>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-info" value="Add Privacy">
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