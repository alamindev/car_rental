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
        <form role="form" action="{{ route('post-model') }}" method="post">
          {{ csrf_field() }}
          <div class="box-body">
            @if(session('message'))
            <div id="message" class="alert alert-success">{{ session('message') }}</div>
            @endif @if(session('update'))
            <div id="update" class="alert alert-info">{{ session('update') }}</div>
            @endif
            <div class="form-group {{ $errors->has('model') ? 'is-invalid' : '' }}">
              <label for="model">Model Name<span class="text-danger">*</span></label>
              <input type="text" name='model' class="form-control" id="model" placeholder="Enter model Name">
              <span class="text-danger">{{ $errors->has('model')? $errors->first('model'): '' }}</span>
            </div>
            <div class="form-group {{ $errors->has('brand') ? 'is-invalid' : '' }}">
              <label>Select Brand<span class="text-danger">*</span></label>
              <select class="form-control select2" name="brand">
                    <option value="">Select a Role</option> 
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                    @endforeach
                  </select>
              <span class="text-danger">{{ $errors->has('model') ? $errors->first('brand') : '' }}</span>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add model</button>
          </div>
        </form>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col (left) -->
  <div class="col-md-6">
    <div class="box  box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">model List</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered" id="datatable">
          @if(session('delete'))
          <div id="delete" class="alert alert-danger">{{ session('delete') }}</div>
          @endif
          <thead>
            <tr>
              <th style="width: 10px">Serial</th>
              <th>model</th>
              <th>Brand Name</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
            @php $i= 1; 
@endphp @foreach($models as $data)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $data->model_name }}</td>
              <td>{{ $data->brand->brand_name }}</td>
              <td>
                <a href="{{ route('edit-model',$data->id) }}"> <i class="fa fa-edit edit"></i></a>
                <a href="{{ route('destroy-model',$data->id) }}"> <i class="fa fa-trash delete"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('script')
<script src="{{ asset('admin-asset') }}/plugins/select2/select2.full.min.js"></script>

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
      $(".select2").select2(); 
  });

</script>
@endsection