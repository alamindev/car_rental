@extends('website.master') 
@section('title') --::cars::--
@endsection
 
@section('main-content')
  @include('website.includes.bread')


<section class="car_list mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center list">
        <h3>Our Cars List</h3>
      </div>
    </div>
    {{-- for car list --}}
    <div class="row mb-5 mt-5 wow slideInUp">
      @if(isset($error)) {{ $error }} @endif @foreach($cars as $car)
      <div class="col-lg-4 ">
        <div class="over_price_item">
          <div class="price_main">
            @if($car->status== 1)
            <div class="available">
              <h3>Available</h3>
            </div>
            @else
            <div class="available">
              <h3>not Available</h3>
            </div>
            @endif
            <h1 class="text-uppercase font-weight-bold border-bottom wow bounceInDown">{{ isset($car->categories) ? $car->categories->cate_name : 'no Category' }}</h1>
            <img src="{{ asset('uploads/car/'.$car->picture) }}" alt="car" width="100%" class="img-fluid wow bounceInLeft">
            <h1 class="text-uppercase mt-4 mb-2 wow zoomIn">
              <sup>$</sup>{{ $car->price_per_hour }}
            </h1>
            <h2 class="d-block w-100">{{ $car->car_name }}</h2>
          </div>
          <div class="price_and_detail">
            <br>
            <ul class="check wow flipInX">
              @if(!empty($car->car_feature))
              <li>
                <i class="fas fa-check"></i>
                <span>{{ isset($car->car_feature) ? $car->car_feature->feature_1 : 'no feature' }}</span>
              </li>
              @endif @if(!empty($car->car_feature))
              <li>
                <i class="fas fa-check"></i>
                <span>{{ isset($car->car_feature) ? $car->car_feature->feature_2 : 'no feature' }}</span>
              </li>
              @endif @if(!empty($car->car_feature))
              <li>
                <i class="fas fa-check"></i>
                <span>{{ isset($car->car_feature) ? $car->car_feature->feature_3 : 'no feature' }}</span>
              </li>
              @endif @if(!empty($car->car_feature))
              <li>
                <i class="fas fa-check"></i>
                <span>{{ isset($car->car_feature) ? $car->car_feature->feature_4 : 'no feature' }}</span>
              </li>
              @endif @if(!empty($car->car_feature))
              <li>
                <i class="fas fa-check"></i>
                <span>{{ isset($car->car_feature) ? $car->car_feature->feature_5 : 'no feature' }}</span>
              </li>
              @endif
            </ul>
            <br>
            <a class="button_btn" href="{{ route('web_car_details',$car->id) }}">Details</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
</section>
@endsection