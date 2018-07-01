@extends('admin.master') 
@section('main-title') --::Car::--
@endsection
 
@section('style')
<link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/select2/select2.min.css">
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">Model</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <form action="{{ route('car-store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
              <label for="title">title<span class="text-danger">*</span></label>
              <input type="text" name='title' class="form-control" id="title" placeholder="Enter car title " value="{{ old('title') }}">
              <span class="text-danger">{{ $errors->has('title')? $errors->first('title'): '' }}</span>
            </div>
            <div class="form-group {{ $errors->has('car_name') ? 'is-invalid' : '' }}">
              <label for="car_name">Car Name<span class="text-danger">*</span></label>
              <input type="text" name='car_name' class="form-control" id="car_name" placeholder="Enter car Name" value="{{ old('car_name') }}">
              <span class="text-danger">{{ $errors->has('car_name')? $errors->first('car_name'): '' }}</span>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group {{ $errors->has('model') ? 'is-invalid' : '' }}">
                  <label>Select model<span class="text-danger">*</span></label>
                  <select class="form-control select2" name="model">
                            <option value="">Select Model</option> 
                            @foreach($models as $model)
                            <option value="{{ $model->id }}">{{ $model->model_name }}</option>
                            @endforeach
                          </select>
                  <span class="text-danger">{{ $errors->has('model') ? $errors->first('model') : '' }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group {{ $errors->has('category') ? 'is-invalid' : '' }}">
                  <label>Select category<span class="text-danger">*</span></label>
                  <select class="form-control select2" name="category">
                            <option value="">Select Category</option> 
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                            @endforeach
                          </select>
                  <span class="text-danger">{{ $errors->has('category') ? $errors->first('category') : '' }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group {{ $errors->has('fual') ? 'is-invalid' : '' }}">
                  <label>Select fual<span class="text-danger">*</span></label>
                  <select class="form-control select2" name="fual">
                            <option value="">Select Faul</option> 
                            @foreach($fuals as $fual)
                            <option value="{{ $fual->id }}">{{ $fual->fual_name }}</option>
                            @endforeach
                          </select>
                  <span class="text-danger">{{ $errors->has('fual') ? $errors->first('fual') : '' }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group {{ $errors->has('color') ? 'is-invalid' : '' }}">
                  <label>Select color<span class="text-danger">*</span></label>
                  <select class="form-control select2" name="color">
                            <option value="">Select Color</option> 
                            @foreach($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                            @endforeach
                          </select>
                  <span class="text-danger">{{ $errors->has('color') ? $errors->first('color') : '' }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group {{ $errors->has('capacity') ? 'is-invalid' : '' }}">
                  <label>Select capacity<span class="text-danger">*</span></label>
                  <select class="form-control select2" name="capacity">
                              <option value="">Select Capacity</option> 
                              @foreach($capacities as $capacity)
                              <option value="{{ $capacity->id }}">{{ $capacity->cap_name }}</option>
                              @endforeach
                            </select>
                  <span class="text-danger">{{ $errors->has('capacity') ? $errors->first('capacity') : '' }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group {{ $errors->has('branch') ? 'is-invalid' : '' }}">
                  <label>Select branch <small class="text-danger">(optional)</small></label>
                  <select class="form-control select2" name="branch">
                              <option value="">Select Branch</option> 
                              @foreach($branches as $branch)
                              <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                              @endforeach
                            </select>
                  <span class="text-danger">{{ $errors->has('branch') ? $errors->first('branch') : '' }}</span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group {{ $errors->has('year') ? 'is-invalid' : '' }}">
                  <label>Select year<small class="text-danger">(optional)</small></label>
                  <select class="form-control showYear select2" name="year"> 
                              <option value="">Select Year</option>  
                            </select>
                  <span class="text-danger">{{ $errors->has('year') ? $errors->first('year') : '' }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group {{ $errors->has('isAuto') ? 'is-invalid' : '' }}">
                  <label>Select Gear box<span class="text-danger">*</span></label>
                  <select class="form-control select2" name="isAuto">
                      <option value="" selected="selected">----</option>
                      <option value="1">Yes</option>
                      <option value="0">No</option> 
                            </select>
                  <span class="text-danger">{{ $errors->has('isAuto') ? $errors->first('isAuto') : '' }}</span>
                </div>
              </div>
            </div>

            <div class="form-group {{ $errors->has('reg_no') ? 'is-invalid' : '' }}">
              <label for="reg_no">registration No<small class="text-danger">(optional)</small></label>
              <input type="text" name='reg_no' class="form-control" id="reg_no" placeholder="Enter registration No." value="{{ old('reg_no') }}">
              <span class="text-danger">{{ $errors->has('reg_no')? $errors->first('reg_no'): '' }}</span>
            </div>
            <div class="form-group {{ $errors->has('hourly_pack') ? 'is-invalid' : '' }}">
              <label for="hourly_pack">Houly Price<span class="text-danger">*</span></label>
              <input type="text" name='hourly_pack' class="form-control" id="hourly_pack" placeholder="Example:- 20" value="{{ old('hourly_pack') }}">
              <span class="text-danger">{{ $errors->has('hourly_pack')? $errors->first('hourly_pack'): '' }}</span>
            </div>
            <div class="form-group {{ $errors->has('daily_pack') ? 'is-invalid' : '' }}">
              <label for="daily_pack">Daily Price <small class="text-danger">(optional)</small></label>
              <input type="text" name='daily_pack' class="form-control" id="daily_pack" placeholder="Example:- 200" value="{{ old('daily_pack') }}">
              <span class="text-danger">{{ $errors->has('daily_pack')? $errors->first('daily_pack'): '' }}</span>
            </div>
            <div class="form-group {{ $errors->has('monthly_pack') ? 'is-invalid' : '' }}">
              <label for="monthly_pack">Monthly Price <small class="text-danger">(optional)</small></label>
              <input type="text" name='monthly_pack' class="form-control" id="monthly_pack" placeholder="Example:- 400" value="{{ old('monthly_pack') }}">
              <span class="text-danger">{{ $errors->has('monthly_pack')? $errors->first('monthly_pack'): '' }}</span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group {{ $errors->has('date ') ? 'is-invalid' : '' }}">
                  <label>Select date <span class="text-danger">*</span></label>
                  <input type="text" name="date" class="datepicker form-control" value="{{ old('date') }}">
                  <span class="text-danger">{{ $errors->has('date ') ? $errors->first('date ') : '' }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group  {{ $errors->has('photo')? 'is-invalid' : '' }}">
                  <label class="form-control-label">Photo <small class="text-danger">*</small></label>
                  <input type="file" name="photo">
                  <small class="text-danger">Photo size: width:700, height:380 and format: PNG</small>
                  <span style="display:block;" class="text-danger">{{ $errors->has('photo')? $errors->first('photo') : '' }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group  {{ $errors->has('age')? 'is-invalid' : '' }}">
                  <label class="form-control-label">age <small class="text-danger">*</small></label>
                  <input type="text" name="age" class="form-control" placeholder="Age here" value="{{ old('age') }}">
                  <span class="text-danger">{{ $errors->has('age')? $errors->first('age') : '' }}</span>
                </div>
              </div>
            </div>
            <div class="form-group  {{ $errors->has('car_details')? 'is-invalid' : '' }}">
              <label class="form-control-label">Details <small class="text-danger">(optional)</small></label>
              <textarea id="editor1" name="car_details" rows="10" cols="80">
                {{ old('car_details') }}
              </textarea>
              <span class="text-danger">{{ $errors->has('car_details')? $errors->first('car_details') : '' }}</span>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-warning">Add Car</button>
          </div>
        </form>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@endsection
 
@section('script')
  <script src="{{ asset('admin-asset') }}/plugins/select2/select2.full.min.js"></script>
  <script src="{{ asset('admin-asset') }}/plugins/ckeditor/ckeditor.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){ 
      CKEDITOR.replace('editor1'); 
    $(".select2").select2(); 
    var date = new Date();
      var year = date.getFullYear();  
      var startYear = 2015;
      for (var i=startYear; i <= year; i++) {
         $('.showYear').append('<option value="'+i+'">'+i+'</option>')
      } 
 $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
  }); 
  });
  </script>
@endsection