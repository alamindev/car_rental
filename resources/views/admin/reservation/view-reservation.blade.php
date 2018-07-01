@extends('admin.master') 
@section('main-title') --:: View Reservation ::--
@endsection
 
@section('main-content')
<div class="row">
    <div class="col-md-12 ">
        <div class="box box-success">
            <div class="box-header pull-left">
                <h3 class="box-title">View Reservation</h3>
            </div>
            <div class="box-header pull-right">
                <a href="{{ route('reservation') }}" class="btn btn-info"><i class="fa fa-users"></i>&nbsp; cars</a>
            </div>
            <div class="clearfix"></div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-striped">
                            <tr>
                                <td>User Id</td>
                                <td>:</td>
                                <td>
                                    @if(!empty($view->users)) {{ $view->users->id }} @endif
                                </td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td>:</td>
                                <td>
                                    @if(!empty($view->users)) {{ $view->users->user_name }} @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Car Name</td>
                                <td>:</td>
                                <td>
                                    @if(!empty($view->cars)) {{ $view->cars->car_name }} @endif
                                </td>
                            </tr>
                            <tr>
                                <td>picUp Location</td>
                                <td>:</td>
                                <td>
                                    @if(!empty($view->PickupLocation)) {{ $view->PickupLocation->branch_name }} @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Return Location</td>
                                <td>:</td>
                                <td>
                                    @if(!empty($view->ReturnLocation)) {{ $view->ReturnLocation->branch_name }} @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Pickup Date</td>
                                <td>:</td>
                                <td>
                                    {{ Carbon\Carbon::parse($view->pickupDate)->format('Y-m-d') }}
                                </td>
                            </tr>
                            <tr>
                                <td>Pickup Time</td>
                                <td>:</td>
                                <td>
                                    {{ $view->pickupTime }}
                                </td>
                            </tr>
                            <tr>
                                <td>Return Date</td>
                                <td>:</td>
                                <td>{{ $view->returnDate }}</td>
                            </tr>
                            <tr>
                                <td>Return Time</td>
                                <td>:</td>
                                <td>{{ $view->returnTime }}</td>
                            </tr>
                            <tr>
                                <td>Extra</td>
                                <td>:</td>
                                <td>{{ $view->extra }}</td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td>:</td>
                                <td>{{ $view->price }} $</td>
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