@extends('website.master') 
@section('title') __::Choose Detials::__
@endsection
 
@section('main-content')
    @include('website.includes.bread')


<section class="service_list mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center list">
                <h3>Choose Us Details</h3>
            </div>
        </div>
        {{-- for service list --}}
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @if(!empty($choose))
                <div class="service_main">
                    <h1 class="text-capitalize text-center mb-4">
                        {{ $choose->title }}
                    </h1>
                    <p class="text-left mt-2">{!! $choose->detail !!}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection