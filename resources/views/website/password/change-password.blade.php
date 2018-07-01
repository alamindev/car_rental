@extends('website.master') 
@section('title') --::Change Password::--
@endsection
 
@section('main-content')
<div class="clearfix"></div>
<section class="mb-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="contact text-center mt-4">
          <h2 class="text-capitalize list"> Change password</h2>
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
          <figcaption class="text-center">{{ $profile->user_name }}</figcaption>
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
        <form role="form" action="{{ route('old_pass') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $edit->email }}">
            <input type="hidden" name="id" value="{{ $edit->id }}">
            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
          </div>
          <div class="form-group">
            <label for="password">Old Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span> @isset($error)
            <span class="text-danger">{{ $error }}</span> @endisset
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