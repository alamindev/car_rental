@extends('admin.master') 
@section('main-title') --::edit feature::--
@endsection
 
@section('main-content')
<form role="form" action="{{ route('feature-update',$edit->id) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title pull-left">Edit feature</h3>
          <a href="{{ route('features') }}" class="btn btn-info pull-right"> <i class="fa fa-backward "></i> back</a>
        </div>
        <div class="clearfix"></div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <div class="form-group {{ $errors->has('car_id') ? 'is-invalid' : '' }}">
                  <label>Select Car <span class="text-danger">*</span></label>
                  <select disabled class="form-control select2" name="car_id">
                              <option value="">Select a Car</option> 
                              @foreach($cars as $car)
                              <option value="{{ $car->id }}"
                                @if($edit->car_id == $car->id)
                                selected
                                @endif
                                >{{ $car->car_name }}</option>
                              @endforeach
                            </select>
                  <span class="text-danger">{{ $errors->has('car_id') ? $errors->first('car_id') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('feature_1') ? 'is-invalid' : '' }}">
                  <label for="feature_1">feature 1 </label>
                  <input type="text" name='feature_1' class="form-control" id="feature_1" value="{{ $edit->feature_1 }}">
                  <span class="text-danger">{{ $errors->has('feature_1') ? $errors->first('feature_1') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('feature_2') ? 'is-invalid' : '' }}">
                  <label for="feature_2">feature 2</label>
                  <input type="text" name='feature_2' class="form-control" id="feature_2" value="{{ $edit->feature_2 }}">
                  <span class="text-danger">{{ $errors->has('feature_2') ? $errors->first('feature_2') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('feature_3') ? 'is-invalid' : '' }}">
                  <label for="feature_3">feature 3 </label>
                  <input type="text" name='feature_3' class="form-control" id="feature_3" value="{{ $edit->feature_3 }}">
                  <span class="text-danger">{{ $errors->has('feature_3') ? $errors->first('feature_3') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('feature_4') ? 'is-invalid' : '' }}">
                  <label for="feature_4">feature 4 </label>
                  <input type="text" name='feature_4' class="form-control" id="feature_4" value="{{ $edit->feature_4 }}">
                  <span class="text-danger">{{ $errors->has('feature_4') ? $errors->first('feature_4') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('feature_5') ? 'is-invalid' : '' }}">
                  <label for="feature_5">feature 1 </label>
                  <input type="text" name='feature_5' class="form-control" id="feature_5" value="{{ $edit->feature_5 }}">
                  <span class="text-danger">{{ $errors->has('feature_5') ? $errors->first('feature_5') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('feature_6') ? 'is-invalid' : '' }}">
                  <label for="feature_6">feature 6</label>
                  <input type="text" name='feature_6' class="form-control" id="feature_6" value="{{ $edit->feature_6 }}">
                  <span class="text-danger">{{ $errors->has('feature_6') ? $errors->first('feature_6') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('feature_7') ? 'is-invalid' : '' }}">
                  <label for="feature_7">feature 7 </label>
                  <input type="text" name='feature_7' class="form-control" id="feature_7" value="{{ $edit->feature_7 }}">
                  <span class="text-danger">{{ $errors->has('feature_7') ? $errors->first('feature_7') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('feature_8') ? 'is-invalid' : '' }}">
                  <label for="feature_8">feature 8 </label>
                  <input type="text" name='feature_8' class="form-control" id="feature_8" value="{{ $edit->feature_8 }}">
                  <span class="text-danger">{{ $errors->has('feature_8') ? $errors->first('feature_8') : '' }}</span>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-secondary" value="Update feature">
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