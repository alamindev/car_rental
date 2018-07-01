@extends('website.master') 
@section('title') --::New Password::--
@endsection
 
@section('main-content')
<div class="clearfix"></div>
<section class="mb-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="contact text-center mt-4">
          <h2 class="text-capitalize list"> New password</h2>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-3 d-flex justify-content-center flex-wrap">
        @if($profile->image == 'photo')
        <figure class="border p-1">
          <img class="img-fluid" width="100%" src="{{ asset('uploads/avatar_1.png') }}" alt="avater">
          <figcaption class="text-center">Avater</figcaption>
        </figure>
        <form class="mt-4" method="post" action="{{ route('upload_user_photo',$profile->id) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="upload">Upload Photo</label>
            <input disabled type="file" class="form-control-file" id="upload" name="photo">
            <span class="text-danger">{{ $errors->has('photo') ? $errors->first('photo') : '' }}</span>
          </div>
          <div class="form-group">
            <input disabled type="submit" name="submit" value="upload" class="btn btn-dark">
          </div>
        </form>
        @else
        <figure class="border p-1">
          <img class="img-fluid" width="100%" src="{{ asset('uploads/user/'.$profile->image) }}" alt="user img">
          <figcaption class="text-center">{{ $profile->user_name}}</figcaption>
        </figure>
        <form class="mt-4" method="post" action="{{ route('update_photo',$profile->id) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="upload" class="text-danger">Update Photo</label>
            <input disabled type="file" class="form-control-file" id="upload" name="photo">
          </div>
          <div class="form-group">
            <input disabled type="submit" name="submit" value="Update" class="btn btn-dark">
          </div>
        </form>
        @endif
      </div>
      <div class="col-lg-9">
        <form role="form" action="{{ route('UpdatePass',$edit->id) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group {{ $errors->has('password') ? 'is-invalid' : '' }}">
            <label for="password">New Password<span class="text-danger">*</span></label>
            <input type="password" name='password' class="form-control" id="password" placeholder="password">
            <input type="hidden" name='id' value="{{ $edit->id }}">
            <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span> @isset($error)
            <span class="text-danger">{{ $error }}</span> @endisset
          </div>
          <div class="form-group">
            <label for="password">Confirm Password<span class="text-danger">*</span></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
          </div>
          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-dark">
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>
<div class="clearfix"></div>
<!-- end coding for customer satisfaction-->
@endsection