@extends('admin.master')
@section('main-title')
  Add new Admin
@endsection
@section('style') 
<link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/select2/select2.min.css">
@endsection
@section('main-content') 
 <form role="form" action="{{ route('admin-store') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
	<div class="row">
        <div class="col-md-12"> 
          <div class="box box-danger">
            <div class="box-header pull-left">
            <h3 class="box-title">Add Admin</h3>
            </div>
            <div class="box-header pull-right">
             <a href="{{ route('admins') }}" class="btn btn-info"><i class="fa fa-users"></i>&nbsp; Admins</a>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12"> 
                    <div class="box-body">
                      <div class="form-group {{ $errors->has('first_name') ? 'is-invalid' : '' }}">
                        <label for="first_name">First Name<span class="text-danger">*</span></label>
                        <input type="text" name='first_name' class="form-control" id="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                        <span class="text-danger">{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}</span>
                      </div>
                      <div class="form-group {{ $errors->has('last_name') ? 'is-invalid' : '' }}">
                        <label for="last_name">Last name<span class="text-danger">*</span></label>
                        <input type="text" name='last_name' class="form-control" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                        <span class="text-danger">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}</span>
                      </div> 
                      <div class="form-group {{ $errors->has('phone') ? 'is-invalid' : '' }}">
                        <label for="phone">Phone Number<span class="text-danger">*</span></label>
                        <input type="text" name='phone' class="form-control" id="phone" value="{{ old('phone') }}" placeholder="Phone Number">
                        <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                      </div> 
                      <div class="form-group {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="text" name='email' class="form-control" id="email" value="{{ old('email') }}" placeholder="Email">
                        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                      </div> 
                      <div class="form-group" style="margin-bottom: 35px;">
                          <label for="image">Admin Photo</label>
                          <input type="file" name='image' id="image" >
                              <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                      </div> 
                      <div class="form-group {{ $errors->has('role') ? 'is-invalid' : '' }}">
                      <label>Admin Role <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="role" >
                          <option value="">Select a Role</option> 
                          @foreach($roles as $role)
                          <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->has('role') ? $errors->first('role') : '' }}</span>
                  </div>
                      <div class="form-group {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        <label for="password">Password<span class="text-danger">*</span></label>
                        <input type="password" name='password' class="form-control" id="password"  placeholder="password">
                        <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                      </div> 
                      <div class="form-group">
                        <label for="password">Confirm Password<span class="text-danger">*</span></label>
                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  >
                      </div> 
                      <div class="box-footer"> 
                        <button type="submit" class="btn btn-success">Add New Admin</button> 
                    </div>
                    </div> 
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --> 
        </div> 
    </div> 
  </form>
@endsection
@section('script') 
<script src="{{ asset('admin-asset') }}/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript"> 
  $(document).ready(function(){
    $(".select2").select2(); 
  }); 
</script>
@endsection
