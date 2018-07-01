@extends('admin.master') 
@section('main-title') --::Car Color::--
@endsection
 
@section('main-content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Color</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form role="form" action="{{ route('update-color',$edit->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if(session('message'))
                        <div id="message" class="alert alert-success">{{ session('message') }}</div>
                        @endif @if(session('update'))
                        <div id="update" class="alert alert-info">{{ session('update') }}</div>
                        @endif
                        <div class="form-group {{ $errors->has('color') ? 'is-invalid' : '' }}">
                            <label for="color">Color Name<span class="text-danger">*</span></label>
                            <input type="text" name='color' class="form-control" id="color" value="{{ $edit->color_name }}">
                            <span class="text-danger">{{ $errors->has('color')? $errors->first('color'): '' }}</span>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add color</button>
                        <a href="{{ route('color') }}" class="btn btn-success pull-right">back</a>
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