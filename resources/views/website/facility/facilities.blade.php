@extends('website.master') 
@section('title') --::Facilities::--
@endsection
 
@section('main-content')
  @include('website.includes.bread')


<section class="service_list mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center list">
        <h3>Our Facilities List</h3>
      </div>
    </div>
    {{-- for service list --}}
    <div class="row">
      @foreach($facilities as $facility)
      <div class="col-lg-4 col-md-4">
        <div class="service_main">
          <i class='{{ $facility->icon }} mb-2'></i>
          <br>
          <h3>
            <a class="text-capitalize" href="{{ route('web_facility_show',$facility->id) }}">{{ $facility->title }}</a>
          </h3>
          <p class="text-left mt-2">{!! str_limit($facility->detail,150,'........') !!}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection