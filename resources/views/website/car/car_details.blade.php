@extends('website.master') 
@section('title') --::Car Details::-
@endsection
 
@section('main-content')
    @include('website.includes.bread')


<section class="service_list mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center list">
                <h3>Car Details</h3>
            </div>
        </div>
        {{-- for service list --}} @if(!empty($car))
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="service_main">

                    <figure>
                        <img src="{{ asset('uploads/car/'.$car->picture) }}" class="img-fluid" width="100%">
                        <figcaption class="text-center text-bold h3">{{ $car->title }}</figcaption>
                    </figure>
                </div>
                <table class="table table-active table-striped table-hover table-primary">
                    <tr>
                        <td>Registration No.</td>
                        <td>
                            @if(!empty($car)) {{ $car->registration }} @endif
                        </td>
                    </tr>
                    <tr>
                        <td>age</td>
                        <td>
                            @if(!empty($car)) {{ $car->miniAge }} @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td>
                            @if(!empty($car)) {{ $car->year }} @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Gear Box
                        </td>
                        <td>
                            @if(!empty($car)) @if($car->isAuto == 1) Automatic @elseif($car->isAuto == 0) Manual @endif @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Per Hour Rent
                        </td>
                        <td>
                            @if(!empty($car)) {{ $car->price_per_hour }} @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Per Day Rent
                        </td>
                        <td>
                            @if(!empty($car)) {{ $car->price_per_day }} @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Per Month Rent
                        </td>
                        <td>
                            @if(!empty($car)) {{ $car->price_per_month }} @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-lg-6">
                <div class="car_description">
                    <p>{!! $car->car_details !!}</p>
                </div>
                <table class="table table-active table-striped table-hover">
                    <tr>
                        <td>Car Model</td>
                        <td>
                            @if(!empty($car->car_model)) {{ $car->car_model->model_name }} @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Category / Type</td>
                        <td>
                            @if(!empty($car->categories)) {{ $car->categories->cate_name }} @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Fual</td>
                        <td>
                            @if(!empty($car->fuals)) {{ $car->fuals->fual_name }} @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Color
                        </td>
                        <td>
                            @if(!empty($car->colors)) {{ $car->colors->color_name }} @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Branch
                        </td>
                        <td>
                            @if(!empty($car->branches)) {{ $car->branches->branch_name }} @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Capacity
                        </td>
                        <td>
                            @if(!empty($car->capacities)) {{ $car->capacities->cap_name }} @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-2 d-flex justify-content-center align-items-center" style="background: whitesmoke; margin-bottom: 15px;">
                <div class="button ">
                    @if($car->status== 1)
                    <div class="available">
                        <a href="{{ route('web_reservation',$car->id) }}" class="button_btn">Book Now</a>
                    </div>
                    @else
                    <div class="available">
                        <h3>not Available</h3>
                        <small>Order Running</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row" style="background: #BA272D; padding: 10px; color: white;x">
            @if(!empty($car->car_feature))
            <div class="col-lg-3">
                <p>{{ $car->car_feature->feature_1 }}</p>
                <p>{{ $car->car_feature->feature_2 }}</p>
            </div>
            <div class="col-lg-3">
                <p>{{ $car->car_feature->feature_3 }}</p>
                <p>{{ $car->car_feature->feature_4 }}</p>
            </div>
            <div class="col-lg-3">
                <p>{{ $car->car_feature->feature_5 }}</p>
                <p>{{ $car->car_feature->feature_6 }}</p>
            </div>
            <div class="col-lg-3">
                <p>{{ $car->car_feature->feature_7 }}</p>
                <p>{{ $car->car_feature->feature_8 }}</p>
            </div>
            @endif
        </div>
    </div>
    @endif
</section>
@endsection