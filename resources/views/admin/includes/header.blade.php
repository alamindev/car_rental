<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">AL</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Dawn </b> Admin</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if(\Auth::guard('admin')->user()->photo != '')
                  <img src="{{ asset('/uploads/admin/'.\Auth::guard('admin')->user()->photo) }}" class="img-rounded" style="width: 100px; height: 100px;">
                     @else
                          <img src="{{ asset('/uploads/avatar.png') }}" class="img-rounded" width="70px">
                  @endif
              <span class="hidden-xs">{{ \Auth::guard('admin')->user()->first_name .' '. \Auth::guard('admin')->user()->last_name  }}</span>
            </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              @if(\Auth::guard('admin')->user()->photo != '')
              <img src="{{ asset('/uploads/admin/'.\Auth::guard('admin')->user()->photo) }}" class="img-rounded" style="width: 100px; height: 100px;">              @else
              <img src="{{ asset('/uploads/avatar.png') }}" class="img-rounded" width="70px"> @endif

              <p>
                <small>Member since {{ \Carbon\Carbon::parse(\Auth::guard('admin')->user()->created_at)->format('l jS M Y') }}</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ route('admin-view',\Auth::guard('admin')->user()->id) }}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{ route('admin_logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>