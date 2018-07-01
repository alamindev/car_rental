@extends('admin.master') 
@section('main-title') -:: All Cars ::-
@endsection
 
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title" style="float: left">All Cars List</h3>
                <a href="{{ route('car-create') }}" class="btn btn-success" style="float: right">&nbsp; Add Car</a>
                <div class="clearfix"></div>
                @if(session('message'))
                <div id="message" class="alert alert-success">{{ session('message') }}</div>
                @endif @if(session('update'))
                <div id="update" class="alert alert-info">{{ session('update') }}</div>
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th style="width: 10px">Serial</th>
                            <th>Car name</th>
                            <th>Model</th>
                            <th>registration</th>
                            <th>category</th>
                            <th>Created Date</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; 
@endphp @foreach($cars as $car)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $car->car_name }}</td>
                            <td>{{ isset($car->car_model) ? ucfirst($car->car_model->model_name) : 'empty'}} </td>
                            <td>{{ $car->registration }}</td>
                            <td>{{ isset($car->categories) ? ucfirst($car->categories->cate_name) : 'empty'}} </td>
                            <td>{{ substr($car->created_at,0,10) }}</td>
                            <td> 
                                <a href="{{ route('car-view',['id'=>$car->id]) }}"> <i class="fa fa-eye view"></i></a> 
                                <a href="{{ route('car-edit',['id'=>$car->id]) }}"> <i class="fa fa-edit edit"></i></a>
                                <a href="{{ route('car-destroy',['id'=>$car->id]) }}" onclick="return confirm('Are You Sure Delete This! ')"> <i class="fa fa-trash delete"></i></a>                        
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
    $(function () { 
    $('#datatable').DataTable( );
    setTimeout(function(){
      $('.success').fadeOut(1000);
    },2000);
    setTimeout(function(){
      $('#update').fadeOut(1000);
    },2000);
  });

</script>
@endsection