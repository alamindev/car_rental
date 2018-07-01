@extends('website.master') 
@section('title') __:: Term and Condition::__
@endsection
 
@section('main-content')
    @include('website.includes.bread')


<section class="service_list mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center list">
                <h3> {{ $term->title }}</h3>
            </div>
        </div>
        {{-- for service list --}}
        <div class="row mb-5">
            <div class="col-lg-12 col-md-12">
                <div class="service_main">
                    <p class="text-left mt-2">{!! $term->detail !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection