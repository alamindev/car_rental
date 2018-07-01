@extends('admin.master') 
@section('main-title') --:: View Car ::--
@endsection
 
@section('main-content')
<div class="row">
    <div class="col-md-12 ">
        <div class="box box-success">
            <div class="box-header pull-left">
                <h3 class="box-title">View Car</h3>
            </div>
            <div class="box-header pull-right">
                <a href="{{ route('cars') }}" class="btn btn-info"><i class="fa fa-users"></i>&nbsp; cars</a>
            </div>
            <div class="clearfix"></div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-striped">
                            <tr>
                                <td>Car Name</td>
                                <td>:</td>
                                <td>{{ $view->title }}</td>
                            </tr>
                            <tr>
                                <td>Car Name</td>
                                <td>:</td>
                                <td>{{ $view->car_name }}</td>
                            </tr>
                            <tr>
                                <td>Details</td>
                                <td>:</td>
                                <td>{!! $view['car_details'] !!}</td>
                            </tr>
                            <tr>
                                <td>minimum Age</td>
                                <td>:</td>
                                <td>{{ $view->miniAge }}</td>
                            </tr>
                            <tr>
                                <td> Year</td>
                                <td>:</td>
                                <td>{{ $view->year }}</td>
                            </tr>
                            <tr>
                                <td>Gearbox</td>
                                <td>:</td>
                                <td>
                                    @if($view->isAuto == 1) Automatic @else manual @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Registration</td>
                                <td>:</td>
                                <td>{{ $view->registration }}</td>
                            </tr>
                            <tr>
                                <td>Hourly Price</td>
                                <td>:</td>
                                <td>{{ $view->price_per_hour }}</td>
                            </tr>
                            <tr>
                                <td>Daily price</td>
                                <td>:</td>
                                <td>{{ $view->price_per_day }}</td>
                            </tr>
                            <tr>
                                <td>monthly Price</td>
                                <td>:</td>
                                <td>{{ $view->price_per_month }}</td>
                            </tr>
                            <tr>
                                <td>model</td>
                                <td>:</td>
                                <td>{{ isset($view->car_model) ? $view->car_model->model_name :'empty' }}</td>
                            </tr>
                            <tr>
                                <td>Fual</td>
                                <td>:</td>
                                <td>{{ isset($view->fuals) ? $view->fuals->fual_name :'empty' }}</td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td>:</td>
                                <td>{{ isset($view->colors) ? $view->colors->color_name :'empty' }}</td>
                            </tr>
                            <tr>
                                <td>category</td>
                                <td>:</td>
                                <td>{{ isset($view->categories) ? $view->categories->cate_name :'empty' }}</td>
                            </tr>
                            <tr>
                                <td>Branch</td>
                                <td>:</td>
                                <td>{{ isset($view->branches) ? $view->branches->branch_name :'empty' }}</td>
                            </tr>
                            <tr>
                                <td>Capacity</td>
                                <td>:</td>
                                <td>{{ isset($view->capacities) ? $view->capacities->cap_name :'empty' }}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>:</td>
                                <td>
                                    <img class="img-responsive" width="250" src="{{ asset('uploads/car/'.$view->picture) }}" alt="image">
                                </td>
                            </tr>

                            <tr>
                                <td>status</td>
                                <td>:</td>
                                <td>
                                    @if ($view->status == 1) publish @else unpublish @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Created Date</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($view->created_at)->format('l jS M Y')}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection