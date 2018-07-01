@extends('admin.master') 
@section('main-title') --::Add video::--
@endsection
 
@section('main-content')
<form role="form" action="{{ route('store-video') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title pull-left">Add video</h3>
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
                <div class="form-group {{ $errors->has('subtitle') ? 'is-invalid' : '' }}">
                  <label for="subtitle">subtitle<span class="text-danger">*</span></label>
                  <input type="text" name='subtitle' class="form-control" id="subtitle" placeholder="Write a service subtitle" value="{{ old('subtitle') }}">
                  <span class="text-danger">{{ $errors->has('subtitle') ? $errors->first('subtitle') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('link') ? 'is-invalid' : '' }}">
                  <label for="link">video link<span class="text-danger">*</span></label>
                  <input type="text" name='link' class="form-control" id="link" placeholder="Write a service link" value="{{ old('link') }}">
                  <span class="text-danger">{{ $errors->has('link') ? $errors->first('link') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('photo') ? 'is-invalid' : '' }}">
                  <label for="photo">photo<span class="text-danger">*</span></label>
                  <input type="file" name='photo' class="form-control">
                  <span class="text-danger">{{ $errors->has('photo') ? $errors->first('photo') : '' }}</span>
                  <small class="text-danger">photo size: - width: 1440, and height:760</small>
                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-info" value="Add video">
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
</script>
@endsection