@extends('admin.master')
@section('main-title')
  --:: Edit Admin ::--
@endsection 
@section('main-content')  
	<div class="row">
        <div class="col-md-6 col-md-offset-3"> 
          <div class="box box-success">
            <div class="box-header pull-left">
            <h3 class="box-title">View Admin</h3>
            </div>
            <div class="box-header pull-right">
             <a href="{{ route('admins') }}" class="btn btn-info"><i class="fa fa-users"></i>&nbsp; Admins</a>
            </div>
            <div class="clearfix"></div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12"> 
                    <table class="table table-hover table-striped">
                      <tr>
                        <td>First Name</td>
                        <td>:</td>
                        <td>{{ $view_admin->first_name }}</td>
                      </tr>  
                      <tr>
                        <td>Last Name</td>
                        <td>:</td>
                        <td>{{ $view_admin->last_name }}</td>
                      </tr>  
                      <tr>
                        <td>Full Name</td>
                        <td>:</td>
                        <td>{{ $view_admin->first_name.''.$view_admin->last_name }}</td>
                      </tr>  
                      <tr>
                        <td>Phone Number</td>
                        <td>:</td>
                        <td>{{ $view_admin->phone }}</td>
                      </tr>  
                      <tr>
                        <td>Email Address</td>
                        <td>:</td>
                        <td>{{ $view_admin->email }}</td>
                      </tr>  
                      <tr>
                        <td>Photo</td>
                        <td>:</td>
                        <td>
                          @if(!$view_admin->photo != 'photo')
                            <img class="img-responsive" width="250" src="{{ asset('uploads/admin/'.$view_admin->photo) }}" alt="image">
                          @else
                           <img class="img-responsive" width="250" src="{{ asset('uploads/avatar.png') }}" alt="image">
                          @endif
                        </td>
                      </tr>  
                       <tr>
                        <td>Created Date</td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($view_admin->created_at)->format('l jS M Y')}}</td>
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
