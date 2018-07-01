@extends('website.master') 
@section('title') service Details
@endsection
 
@section('main-content')
    @include('website.includes.bread')


<section class="service_list mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center list">
                <h3>Service Details</h3>
            </div>
        </div>
        {{-- for service list --}}
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="service_main">
                    <i class='{{ $service->icon }} mb-2' style="font-size:100px;"></i>
                    <br>
                    <h1 class="text-capitalize text-center">
                        {{ $service->title }}
                    </h1>
                    <p class="text-left mt-2">{!! $service->detail !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection