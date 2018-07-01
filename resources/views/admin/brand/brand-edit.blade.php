@extends('admin.master') 
@section('main-title') --::Car Brand::--
@endsection
 
@section('main-content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Brand</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form role="form" action="{{ route('update-brand',$edit->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if(session('message'))
                        <div id="message" class="alert alert-success">{{ session('message') }}</div>
                        @endif @if(session('update'))
                        <div id="update" class="alert alert-info">{{ session('update') }}</div>
                        @endif
                        <div class="form-group {{ $errors->has('brand') ? 'is-invalid' : '' }}">
                            <label for="brand">Brand Name<span class="text-danger">*</span></label>
                            <input type="text" name='brand' class="form-control" id="brand" value="{{ $edit->brand_name }}">
                            <span class="text-danger">{{ $errors->has('brand')? $errors->first('brand'): '' }}</span>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('brand') }}" class="btn btn-success pull-right">back</a>
                    </div>
                </form>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection
 
@section('script')
    <script type="text/javascript">
        $(function(){
      $('#datatable').DataTable(); 
  });
    </script>
@endsection