@extends('admin.master') 
@section('main-title') --::Car Category::--
@endsection
 
@section('main-content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Categories</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form role="form" action="{{ route('update-category',$edit->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @if(session('message'))
                        <div id="message" class="alert alert-success">{{ session('message') }}</div>
                        @endif
                        <div class="form-group {{ $errors->has('cate_name') ? 'is-invalid' : '' }}">
                            <label for="cate_name">Category Name<span class="text-danger">*</span></label>
                            <input type="text" name='cate_name' class="form-control" id="cate_name" value="{{ $edit->cate_name }}">
                            <span class="text-danger">{{ $errors->has('cate_name')? $errors->first('cate_name'): '' }}</span>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                        <a href="{{ route('category') }}" class="btn btn-success pull-right">Back</a>
                    </div>
                </form>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col (left) -->
    <div class="col-md-6 " style="display:none;">
        <div class="box  box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Category List</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th style="width: 10px">Serial</th>
                            <th>Name</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i= 1; 
@endphp @foreach($category as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->cate_name }}</td>
                            <td>
                                <a href="{{ route('edit-category',$data->id) }}"> <i class="fa fa-edit edit"></i></a>
                                <a href="{{ route('edit-category',$data->id) }}"> <i class="fa fa-trash delete"></i></a>
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
<script type="text/javascript">
    $(function(){
      $('#datatable').DataTable();
      setTimeout(function(){
        $('#message').fadeOut('slow');
      },2000);
  });

</script>
@endsection