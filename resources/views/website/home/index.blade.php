@extends('website.master') 
@section('title') Dawn Cars Rental
@endsection
 
@section('style')
<link rel="stylesheet" href="{{ asset('website-asset') }}/assets/datepicker/datepicker3.css">
@endsection
 
@section('main-content')
<div class="preloader">
  <div class="sk-spinner sk-spinner-wave">
    <div class="sk-ret1"></div>
    <div class="sk-rect2"></div>
    <div class="sk-rect3"></div>
    <div class="sk-rect4"></div>
    <div class="sk-rect5"></div>
  </div>
</div>
<section class="slider">
  <div class="container-fluid pl-0 pr-0">
    <div class="row no-gutters">
      <div class="col-lg-12">
        <div class="slider-main owl-carousel">
          <!-- start coding for slider item -->
          @foreach($cars as $car) @foreach($banners as $banner)
          <div class="item">
            <img src="{{ asset('uploads/banner/'.$banner->banner) }}" width="100%" class="img-fluid" alt="slider image">
            <div class="slider_overlay">
              <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                  <div class="title mt-3">
                    <h5 class="text-center text-uppercase main_color animated bounceInDown">book a car now</h5>
                    <h1 class="text-uppercase animated bounceInUp">{{ $car->title }}</h1>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-sm-6 d-flex justify-content-center flex-wrap align-items-center">
                  <div class="book_now">
                    <h1 class="animated bounceInDown text-uppercase main_color">{{ $car->car_name }}</h1>
                    <h2 class="animated bounceInLeft text-uppercase"><sup style="font-weight:bold">$</sup>{{ $car->price_per_hour }} &nbsp; / Hour</h2>
                  </div>
                  <a href="{{ route('web_car_details',$car->id) }}" class="animated rollIn">book Now</a>
                </div>
                <div class="col-lg-6 col-sm-6">
                  <div class="slider-img">
                    <img class="animated bounceInRight slider_animation" src="{{ asset('uploads/car/'.$car->picture) }}" alt="car image">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end slider item -->
          @endforeach @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<main>
  <!-- start coding for book now search bar -->
  <section class="book_now_search">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="form_for_book">
            <div class="row">
              <div class="col-lg-12 d-flex justify-content-center">
                <h1 class="text-uppercase mb-4 wow zoomIn">Rant a car Now!</h1>
              </div>
            </div>
            <form method="GET" action="{{ route('search') }}">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-2 col-md-4 wow zoomIn">
                  <div class="custom-select">
                    <select name="car_model">
                      <option value="" disabled selected>Select Model</option>
                      @foreach($models as $model)
                        <option value="{{ $model->id }}">{{ $model->model_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <span class="text-light d-block mt-3">{{ $errors->has('car_model')? $errors->first('car_model'): '' }}</span>
                </div>
                <div class="col-lg-2 col-md-4 wow zoomIn">
                  <div class="custom-select">
                    <select name="pickupLocation">
                      <option selected disabled>Picup Location</option>
                      @foreach($branches as $branch)
                      <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                    @endforeach
                    </select>
                  </div>
                  <span class="text-light d-block mt-3">{{ $errors->has('pickupLocation')? $errors->first('pickupLocation'): '' }}</span>
                </div>
                <div class="col-lg-2 col-md-4 wow zoomIn">
                  <div class="custom-select">
                    <select name="returnLocation">
                     <option selected disabled>Return Location</option>
                        @foreach($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                      @endforeach
                      </select>
                  </div>
                  <span class="text-light d-block mt-3">{{ $errors->has('returnLocation')? $errors->first('returnLocation'): '' }}</span>
                </div>
                <div class="col-lg-2 col-md-4 wow zoomIn">
                  <div class="custom-select">
                    <input type="text" name="pickupDate" class="datepicker form-control" placeholder="Select Pickup Date">
                    <span class="text-light">{{ $errors->has('pickupDate')? $errors->first('pickupDate'): '' }}</span>
                  </div>
                </div>
                <div class="col-lg-2 col-md-4 wow zoomIn">
                  <div class="custom-select">
                    <div class="custom-select">
                      <input type="text" name="returnDate" class="datepicker form-control" placeholder="Select Return Date">
                      <span class="text-light  d-block mt-3">{{ $errors->has('returnDate')? $errors->first('returnDate'): '' }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 col-md-4 wow zoomIn">
                  <input type="submit" value="Search" class="button hvr-grow hvr-icon-grow-rotate">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- start coding for trust_area / facility area --}}
  <section class="trust_area">
    <div class="container">
      <div class="row">
        @foreach($facilities as $facility)
        <div class="col-lg-4 col-md-6">
          <div class="row">
            <div class="col-lg-3 col-md-3 wow slideInUp">
              <i class="{{ $facility->icon }}"></i>
            </div>
            <div class="col-lg-9">
              <h3>
                <a href="{{ route('web_facility_show',$facility->id) }}" class="wow bounce">{{ $facility->title }}</a>
              </h3>
              <p class="wow slideInLeft">{!! str_limit($facility->detail,300,'........') !!} </p>
            </div>
          </div>
        </div>
        @endforeach
        <div class="clearfix"></div>
      </div>
      <div class="row mt-5 pb-5">
        <div class="col-lg-12 d-flex justify-content-start">
          <a href="{{ route('web_facility') }}" class='button_btn'>Show More..</a>
        </div>
      </div>
    </div>
  </section>
  <section class="service_area pt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3 wow zoomIn">
          <div class="heading">
            <h1 class="text-center text-uppercase mt-2 mb-2">Our services</h1>
            <p class="text-center">We are offering a variety of cars,services and patnership ot meet all your travel needs.</p>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-lg-3 col-md-3 ">
          <div class="row">
            @foreach($service_one as $service)
            <div class="col-lg-12 col-md-12  mb-4">
              <div class="service_main">
                <i class='{{ $service->icon }} mb-2'></i>
                <br>
                <h3>
                  <a class="text-capitalize " href="{{ route('web_service_show', $service->id) }}">{{ $service->title }}</a>
                </h3>
                <p class="text-left mt-2">{!! str_limit($service->detail,150,'........') !!}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- start coding for simple slider -->
        <div class="col-lg-6 col-md-6 wow bounceInUp">
          <div class="gellary_slider">
            @foreach($cars as $car)
            <div class="single_team_item">
              <img src="{{ asset('uploads/car/'.$car->picture) }}" class="img-fluid " alt="simple slider">
            </div>
            @endforeach
          </div>
        </div>
        <!-- end coding simple slider -->
        <div class="col-lg-3 col-md-3 wow slideInRight">
          <div class="row">
            @foreach($service_two as $service)
            <div class="col-lg-12 col-md-12  mb-4">
              <div class="service_main">
                <i class='{{ $service->icon }} mb-2'></i>
                <br>
                <h3>
                  <a class="text-capitalize" href="{{ route('web_service_show', $service->id) }}">{{ $service->title }}</a>
                </h3>
                <p class="text-left mt-2">{!! str_limit($service->detail,150,'........') !!}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5 pt-5">
      <div class="col-lg-12 d-flex justify-content-center">
        <a href="{{ route('web_service') }}" class='button_btn'>Show More..</a>
      </div>
    </div>
    </div>
  </section>
  <section class="price_area wow zoomIn">
    <div class="container">
      <!-- start coding for header -->
      <div class="row mb-5">
        <div class="col-lg-6 offset-lg-3">
          <div class="heading">
            <h1 class="text-center text-uppercase mt-2 mb-2 wow zoomIn">Pricing Option</h1>
            <p class="text-center wow slideInRight">If you are looking for a best selection and pirce on rental car, look no further.</p>
          </div>
        </div>
      </div>
      <!-- start coding for main pricing area -->
      <div class="row mt-5 no-gutters wow slideInUp">
        @foreach($cars as $car)
        <div class="col-lg-4 over_price_item">
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
            <div class="price_and_detail">
              <h1 class="text-uppercase mt-4 mb-2 wow zoomIn">
                <sup>$</sup>{{ substr($car->price_per_hour,0,3) }}
              </h1>
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
              <a class="button_btn" href="{{  route('web_car_details',$car->id) }}">get started</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row mt-5 pt-5">
        <div class="col-lg-12 d-flex justify-content-center">
          <a href="{{ route('web_car') }}" class='button_btn'>Show More..</a>
        </div>
      </div>
    </div>
  </section>
  <!-- start coding for choose us section -->
  <section class="choose_us">
    <div class="container">
      <div class="row border-bottom">
        <div class="col-lg-6 col-md-6 pb-5">
          @if(!empty($choose))
          <div class="choose">
            <h1 class="text-uppercase font-weight-bold wow flipInX">{{ $choose->title }}</h1>
            <br>
            <p class="wow zoomIn">{!! str_limit($choose->detail,200,'........') !!}</p>
            <br>
            <a href="{{ route('web_choose') }}" class="button_btn_back mb-4 wow bounceIn">Details</a>
          </div>
          @endif
        </div>
        <div class="col-lg-6 col-md-6 pb-5">
          @foreach($ratings as $rating)
          <!-- start coding for prograss bar -->
          <div class="choose  mb-4 wow flipInY">
            <span class="progressText mb-3">
              <b class="mb-4">{{ $rating->title }}</b>
            </span>
            <div class="progress mt-3">
              <div class="progress-bar" role="progressbar" data-percentage="{{ $rating->parcent }}">
                <span class="progress-bar-percentage pull-right">
              </div>
            </div>
          </div>
          <!-- end coding progress bar -->
          @endforeach 
        </div>
      </div>
    </div>
  </section>
  <!-- End coding for choose us section -->
  <!-- start coding for review section -->
  <section class="review pb-5 mb-5 wow zoomIn">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="slider_review owl-carousel">
            <!-- start coding coding for slider item -->
          @foreach($reviews as $review)
            <div class="item">
              <header>
                <h2 class="wow bounceInUp">{{ $review->title }}</h2>
                <p class="wow fadeInDownBig">{!! $review->detail !!}</p>
              </header>
              <div class="review_body wow fadeInDown">
                <img src="{{ asset('uploads/review/'.$review->photo) }}" width="100%" class="img-fluid" alt="customer review">
                <h4 class="text-uppercase">{{ $review->name }}</h4>
                <address class="text-capitalize">{{ $review->address }}</address>
              </div>
            </div>
            <!-- end coding coding for slider item -->
            @endforeach 
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end coding review section -->
  @if(!empty($video))
  <section class="video wow slideInDown">
    <div class="container-fluid no-gutters p-0">
      <div class="row">
        <div class="col-lg-12">
          <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('uploads/video/'.$video->photo) }}" data-z-index="-1">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <div class="video_text text-center">
                  <h1 class="text-center">{{ $video->title }}</h1>
                  <p>{{ $video->subtitle }}</p>
                  <br>
                  <a style="z-index: 9999" data-fancybox href="{{ $video->link }}">
                    <i class="fas fa-play"></i>
                  </a>

                  </a>
                  <br>
                  <a href="{{ route('web_car') }}" class="button_btn text-light">see all cars</a>
                  <a href="{{ route('web_contact') }}" class="button_btn_back">contact</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  @endif
  <!-- google map -->
  <div class="clearfix"></div>
  <section class="google_map pt-5 wow slideInRight">
    <div class="container-fluid no-gutters pl-0 pr-0">
      <div class="row">
        <div class="col-lg-12 col-md-12 pt-5">
          <div id="map"> </div>
          <div class="find_us wow zoomIn">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                @if(!empty($contact))
                <div class="find_us_text ">
                  <h2 class="text-uppercase">how to find us</h2> 
                  <ul class="address mb-5">
                    <li>
                      <i class="fas fa-map-marker-alt"></i>
                      {{ str_limit($contact->reg_address,20,'...') }}
                    </li>
                    <li>
                      <i class="fas fa-phone"></i>
                      {{ $contact->call_us }}
                    </li>
                    <li>
                      <i class="fas fa-envelope "></i>
                      {{ $contact->email_address }}
                    </li>
                  </ul>
                  <h2>opening hours</h2>
                  <ul class="month_day">
                    <li>
                      {{ $contact->open_day_1 }}
                      <span>{{ $contact->open_time_1 }}</span>
                </li>
                <li>
                  {{ $contact->open_day_2 }}
                  <span>{{ $contact->open_time_2 }}</span>
                </li>
                <li>
                  {{ $contact->open_day_3 }}
                  <span>{{ $contact->open_time_3 }}</span>
                </li>
                </ul>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</main>
@endsection
 
@section('script')
<!-- Google Maps JS API -->
<script src="http://maps.google.com/maps/api/js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa9GzJJXP1Afq1EgtHFvzIuP29cO267vk&callback=initMap" async
  defer></script>
<script src="{{ asset('website-asset') }}/assets/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(document).ready(function(){   
 $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
  });  


  
  });
  var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -4.661959, lng: 55.465206},
          zoom: 8
        });
      }

</script>
@endsection