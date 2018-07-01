@extends('admin.master') 
@section('main-title') --:: Edit Admin ::--
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="box box-success">
      <div class="box-header pull-left">
        <h3 class="box-title">View Admin</h3>
      </div>
      <div class="box-header pull-right">
        <a href="{{ route('customers') }}" class="btn btn-info"><i class="fa fa-users"></i>&nbsp; All Customers</a>
      </div>
      <div class="clearfix"></div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover table-striped">
              <tr>
                <td>Customer Id</td>
                <td>:</td>
                <td>00{{ $view->id }}</td>
              </tr>
              <tr>
                <td>First Name</td>
                <td>:</td>
                <td>{{ $view->first_name }}</td>
              </tr>
              <tr>
                <td>Last Name</td>
                <td>:</td>
                <td>{{ $view->last_name }}</td>
              </tr>
              <tr>
                <td>User Name</td>
                <td>:</td>
                <td>{{ $view->user_name }}</td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td>{{ $view->phone }}</td>
              </tr>
              <tr>
                <td>Email Address</td>
                <td>:</td>
                <td>{{ $view->email }}</td>
              </tr>
              <tr>
                <td>Photo</td>
                <td>:</td>
                <td>
                  @if(!$view->image != 'photo')
                  <img class="img-responsive" width="250" src="{{ asset('uploads/admin/'.$view->image) }}" alt="image"> @else
                  <img class="img-responsive" width="250" src="{{ asset('uploads/avatar.png') }}" alt="image"> @endif
                </td>
              </tr>
              <tr>
                <td>Created Date</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($view->created_at)->format('l jS M Y')}}</td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td>{{ $view->address }}</td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td>{{ $view->city }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection