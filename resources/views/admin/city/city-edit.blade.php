@extends('admin.master') 
@section('main-title') --::City::--
@endsection
 
@section('main-content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">City</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form role="form" action="{{ route('update-city',$edit->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if(session('message'))
                        <div id="message" class="alert alert-success">{{ session('message') }}</div>
                        @endif @if(session('update'))
                        <div id="update" class="alert alert-info">{{ session('update') }}</div>
                        @endif
                        <div class="form-group {{ $errors->has('city') ? 'is-invalid' : '' }}">
                            <label for="city">City<span class="text-danger">*</span></label>
                            <input type="text" name='city' class="form-control" id="city" value="{{ $edit->city_name }}">
                            <span class="text-danger">{{ $errors->has('city')? $errors->first('city'): '' }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('post_code') ? 'is-invalid' : '' }}">
                            <label for="post_code">Postal Code<span class="text-danger">*</span></label>
                            <input type="text" name='post_code' class="form-control" id="post_code" value="{{ $edit->postal_code }}">
                            <span class="text-danger">{{ $errors->has('post_code')? $errors->first('post_code'): '' }}</span>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info">Updated</button>
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
      setTimeout(function(){
        $('#message').fadeOut('slow');
      },2000);
      setTimeout(function(){
        $('#delete').fadeOut('slow');
      },2000);
      setTimeout(function(){
        $('#update').fadeOut('slow');
      },2000); 
  });
    </script>
@endsection