<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 330px;">
    <section class="sidebar" style="height: 330px; overflow: hidden; width: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(\Auth::guard('admin')->user()->photo != '')
          <img src="{{ asset('/uploads/admin/'.\Auth::guard('admin')->user()->photo) }}" class="img-rounded" width="70">          @else
          <img src="{{ asset('/uploads/avatar.png') }}" class="img-rounded" width="70px"> @endif
        </div>
        <div class="pull-left info">
          <p>{{ \Auth::guard('admin')->user()->first_name .' '. \Auth::guard('admin')->user()->last_name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header text-center ">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Car Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{ route('category') }}"><i class="fa fa-medkit"></i>Category</a></li>
            <li><a href="{{ route('brand') }}"><i class="fa fa-medkit"></i>Brand</a></li>
            <li><a href="{{ route('model') }}"><i class="fa fa-medkit"></i>Model</a></li>
            <li><a href="{{ route('color') }}"><i class="fa fa-medkit"></i>Color</a></li>
            <li><a href="{{ route('capacity') }}"><i class="fa fa-medkit"></i>Capacity</a></li>
            <li><a href="{{ route('fual') }}"><i class="fa fa-medkit"></i>Fual</a></li>
            <li><a href="{{ route('city') }}"><i class="fa fa-medkit"></i>City</a></li>
            <li><a href="{{ route('branch') }}"><i class="fa fa-medkit"></i>Branch</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-car"></i>
            <span>Cars</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{ route('cars') }}"><i class="fa fa-medkit"></i>Car</a></li>
            <li><a href="{{ route('features') }}"><i class="fa fa-medkit"></i>features</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="{{ route('reservation') }}">
            <i class="fa fa-ambulance  "></i> <span>Reservation</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('services') }}">
            <i class="fa fa-server "></i> <span>Services</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('facilities') }}">
            <i class="fa fa-industry"></i> <span>Facilities</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('contact') }}">
            <i class="fa fa-contao"></i> <span>Contact</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Manage Website</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{ route('about') }}"><i class="fa fa-medkit"></i>About</a></li>
            <li><a href="{{ route('videos') }}"><i class="fa fa-youtube"></i>video</a></li>
            <li><a href="{{ route('choose') }}"><i class="fa fa-globe "></i>Choose</a></li>
            <li><a href="{{ route('rating') }}"><i class="fa fa-star"></i>Rating</a></li>
            <li><a href="{{ route('social') }}"><i class="fa fa-share-square "></i>Social</a></li>
            <li><a href="{{ route('logoandtitle') }}"><i class="fa fa-pied-piper "></i>Logo & Title</a></li>
            <li><a href="{{ route('copyright') }}"><i class="fa fa-copyright "></i>Copyright</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="{{ route('banner') }}">
            <i class="fa fa-image "></i> <span>Banner</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('user_contact') }}">
            <i class="fa fa-user"></i> <span>User Contact</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('term') }}">
            <i class="fa fa-compass"></i> <span>Term and condition</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('privacy') }}">
            <i class="fa fa-user-secret "></i> <span>Privacy</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('reviews') }}">
            <i class="fa fa-user-secret"></i> <span>Review</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('customers') }}">
            <i class="fa fa-wheelchair "></i> <span>Customers</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('admins') }}">
            <i class="fa fa-users"></i> <span>admins</span>
          </a>
        </li>
      </ul>
    </section>
    <div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.2) none repeat scroll 0% 0%; width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 304.19px;"></div>
    <div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div>
  </div>
  <!-- /.sidebar -->
</aside>