<!-- start coding for top header -->
<header>
  <div class="top-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <ul class="contact list-unstyled  d-flex">
            @if(!empty($contact))
            <li>
              <i class="fas fa-phone"></i>
              <span>{{ $contact->call_us }}</span>
            </li>
            <li>
              <i class="fas fa-envelope-open"></i>
              <span>{{ $contact->email_address }}</span>
            </li>
            @endif
          </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end">
          <ul class="social list-unstyled d-flex">
            @if(!empty($social))
            <li>
              <a href="{{ $social->facebook }}">
                  <i class="fab fa-facebook"></i>
                </a>
            </li>
            <li>
              <a href="{{ $social->twitter }}">
                  <i class="fab fa-twitter-square"></i>
                </a>
            </li>
            <li>
              <a href="{{ $social->google }}">
                  <i class="fab fa-google-plus-square"></i>
                </a>
            </li>
            <li>
              <a href="{{ $social->linkedin }}">
                  <i class="fab fa-linkedin"></i>
                </a>
            </li>
            <li>
              <a href="{{ $social->youtube }}">
                  <i class="fab fa-youtube"></i>
                </a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- start coding for header area -->
  <nav class="navbar navbar-expand-md navbar-light header_back">
    <div class="container">
      @if(!empty($logo))
      <a class="navbar-brand" href="#"> 
          <img src="{{ asset('uploads/logo/'.$logo->logo) }}" alt="{{ $logo->title }}" width="140" class="img-fluid" title="{{ $logo->title }}">
        </a> @endif
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">service</a>
            <ul class="sub-nav">
              @foreach($services as $service)
              <li>
                <a href="{{ route('web_service_show',$service->id) }}">{{ $service->title }}</a>
              </li>
              @endforeach
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('web_about') }}">about us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('web_contact') }}">contact us</a>
          </li>
          @guest
          <li><a class="button_btn" style="line-height: 67px;" href="{{ route('login') }}">Login</a></li>
          @else
          <li class="dropdown">
            <a class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->user_name }} <span class="caret"></span>
                  </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('web_profile',auth()->user()->id) }}">Profile </a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          Logout
                      </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
</header>
<!-- End  header area -->
<div class="clearfix"></div>