@extends('website.master') 
@section('title') __:: About Us ::__
@endsection
 
@section('main-content')
    @include('website.includes.bread')


<section class="service_list mt-4">
    @if(!empty($about))
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center list">
                <h3> {{ $about->title }}</h3>
            </div>
        </div>
        {{-- for service list --}}
        <div class="row mb-5">
            @if(!empty($about))
            <div class="col-lg-4 col-md-4">
                <img src="{{ asset('uploads/about/'.$about->photo) }}" alt="" class="img-fluid" width="100%">
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="service_main">
                    <p class="text-left mt-2">{!! $about->detail !!}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif
</section>
@endsection