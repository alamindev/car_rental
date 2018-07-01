@extends('website.master') 
@section('title') __:: Contact ::__
@endsection
 
@section('main-content')
    @include('website.includes.bread')


<section class="contact mb-4 mt-5">
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-6 col-md-6">
                <div class="form">
                    <h4 class="border-bottom border-danger mb-5 text-capitalize text-bold">Contact Form</h4>
                    @if(session('message'))
                    <div class="alert alert-success message">{{ session('message') }}</div>
                    @endif
                    <form action="{{ route('user_contact_store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'is-invalid' : '' }}">
                            <label for="email" class="grey-text">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('subject') ? 'is-invalid' : '' }}">
                            <label for="Subject" class="grey-text">Subject</label>
                            <input type="text" name="subject" id="Subject" class="form-control">
                            <span class="text-danger">{{ $errors->has('subject') ? $errors->first('subject') : '' }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('message') ? 'is-invalid' : '' }}">
                            <label for="Message" class="grey-text">Message</label>
                            <textarea id="Message" name="message" class="form-control" rows="10" cols="6"></textarea>
                            <span class="text-danger">{{ $errors->has('message') ? $errors->first('message') : '' }}</span>
                        </div>
                        <div class=" mt-4">
                            <button class="button_btn" type="submit">Send<i class="fa fa-paper-plane-o ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                @if(!empty($contact))
                <div class="contact-address">
                    <h4 class="border-bottom border-danger mb-5 text-capitalize text-bold">Contact Address</h4>
                    <div class="address">
                        <h5>{{ $contact->title }}</h5>
                        <hr>
                        <br>
                        <ul class="main-contact">
                            <li><i class="fa fa-map-marker"></i><span>register Address:</span> {{ $contact->reg_address }}</li>
                            <li><i class="fa fa-envelope"></i><span>Email Address: </span> {{ $contact->email_address }}</li>
                            <li><i class="fa fa-phone"></i><span>Call Us: </span>{{ $contact->call_us }} </li>
                            <li><i class="fa fa-phone"></i><span>SMS/Viber/WhatsApp: </span>{{ $contact->sms }}</li>
                        </ul>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item my-5" src="{{ $contact->google_link }}" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        {{-- for openning hour --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="time_hour">
                    <ul>
                        @if(!empty($contact))
                        <li>
                            <span>{{ $contact->open_day_1 }}</span><br>
                            <hr>{{$contact->open_time_1 }}
                        </li>
                        <li>
                            <span>{{ $contact->open_day_2 }}</span><br>
                            <hr> {{ $contact->open_time_2 }}
                        </li>
                        <li>
                            <span>{{ $contact->open_day_3 }}</span><br>
                            <hr> {{ $contact->open_time_3 }}
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
 
@section('script')
<script>
    $(function(){
         setTimeout(function(){
             $('.message').fadeOut(1000);
         },2000);
     })

</script>
@endsection