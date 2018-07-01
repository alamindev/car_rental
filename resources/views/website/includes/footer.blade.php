<!-- start coding for footer area -->
<footer class="footer_area">
  <div class="container footer-head">
    @if(!empty($contact))
    <div class="row">
      <div class="col-lg-4 col-md-4 wow zoomIn">
        <div class="address">
          <div class="row no-gutters">
            <div class="col-lg-2 col-md-2">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="col-lg-10 col-md-10">
              <h4 class="text-uppercase">Address</h4>
              <p>{{ str_limit($contact->reg_address,30,'..') }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4  col-md-4 wow zoomIn">
        <div class="phone">
          <div class="row no-gutters">
            <div class="col-lg-2 col-md-2">
              <i class="fas fa-phone-volume"></i>
            </div>
            <div class="col-lg-10 col-md-10">
              <h4 class="text-uppercase">Phone</h4>
              <p>{{ $contact->call_us }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4  col-md-4 wow zoomIn">
        <div class="email">
          <div class="row no-gutters">
            <div class="col-lg-2 col-md-2">
              <i class="far fa-envelope-open"></i>
            </div>
            <div class="col-lg-10 col-md-10">
              <h4 class="text-uppercase">Email</h4>
              <p>{{ $contact->email_address }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
  <!-- start coding for main footer area -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-4 col-md-4 wow slideInLeft">
        @if(!empty($about))
        <div class="about_us">
          <h4 class="text-uppercase">{{ $about->title }}</h4>
          <p>{!! str_limit($about->detail,200,'...') !!}</p>
          <a href="{{ route('web_about') }}" class="detail" title="about details">details</a> @endif
          <br> @if(!empty($social))
          <ul class="social_footer">
            <li>
              <a href="{{ $social->facebook }}">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="{{ $social->twitter }}">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="{{ $social->google }}">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </li>
            <li>
              <a href="{{ $social->linkedin }}">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
          @endif
        </div>
      </div>
      <div class="col-lg-4 col-md-4 wow slideInDown">
        <div class="services_title">
          <h4 class="text-uppercase">Services</h4>
          <ul class="service_footer">
            @foreach($services as $service)
            <li>
              <a href="{{ route('web_service_show',$service->id) }}">{{ $service->title }}</a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 wow slideInRight">
        <div class="additional_link">
          <h4 class="text-uppercase">Additional Link</h4>
          <ul class="link_footer">
            <li class="text-uppercase">
              <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
              <a href="{{ route('web_about') }}">About Us</a>
            </li>
            <li>
              <a href="{{ route('web_contact') }}">Contact</a>
            </li>
            <li>
              <a href="{{ route('web_service') }}">Services</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- start coding for copyright -->
  <section class="copyright wow flipInY">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          @if(!empty($copy))
          <strong>Copyright &copy; 2018 - {{ Carbon\Carbon::now()->format('Y') }} <a href="#">{{ $copy->copyright }}</a>.</strong>          All rights reserved. @endif
        </div>
        <div class="col-lg-6 col-md-6">
          <ul class="trm_and_condition">
            <li>
              <a href="{{ route('web_privacy') }}" class="text-capitalize">Privacy and policy</a>
            </li>
            <li>
              <a href="{{ route('web_term') }}" class="text-capitalize">terms and condition</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</footer>
<!-- end footer area -->
<section>
  <div class="scroll_top">
    <i class="fas fa-arrow-up"></i>
  </div>
</section>