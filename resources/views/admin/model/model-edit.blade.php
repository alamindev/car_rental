@extends('admin.master') 
@section('main-title') --::Car Model::--
@endsection
 
@section('style')
<link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/select2/select2.min.css">
@endsection
 
@section('main-content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Model</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form role="form" action="{{ route('update-model',$edit->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if(session('message'))
                        <div id="message" class="alert alert-success">{{ session('message') }}</div>
                        @endif @if(session('update'))
                        <div id="update" class="alert alert-info">{{ session('update') }}</div>
                        @endif
                        <div class="form-group {{ $errors->has('model') ? 'is-invalid' : '' }}">
                            <label for="model">Model Name<span class="text-danger">*</span></label>
                            <input type="text" name='model' class="form-control" id="model" value="{{ $edit->model_name }}">
                            <span class="text-danger">{{ $errors->has('model')? $errors->first('model'): '' }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('brand') ? 'is-invalid' : '' }}">
                            <label>Select Brand<span class="text-danger">*</span></label>
                            <select class="form-control select2" name="brand">
                    <option value="">Select a Role</option> 
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                        @if($edit->brand_id == $brand->id)
                            selected
                        @endif
                        >{{ $brand->brand_name }}</option>
                    @endforeach
                  </select>
                            <span class="text-danger">{{ $errors->has('model') ? $errors->first('brand') : '' }}</span>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('model') }}" class="btn btn-success pull-right">back</a>
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

    <script type="text/javascript">
        $(function(){
      $('#datatable').DataTable(); 
      $(".select2").select2(); 
  });
    </script>
@endsection