@extends('website.master') 
@section('title') --::Edit {{ $profile->user_name }} Profile::--
@endsection
 
@section('main-content')
<div class="clearfix"></div>
<section class="mb-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="contact text-center mt-4">
          <h2 class="text-capitalize list">Edit {{ $profile->user_name }} Profile</h2>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-3 d-flex justify-content-center flex-wrap">
        @if($profile->image == 'photo')
        <figure class="border p-1">
          <img width="100%" class="img-fluid" src="{{ asset('uploads/avatar_1.png') }}" alt="avater">
          <figcaption class="text-center">Avater</figcaption>
        </figure>
        <form class="mt-4" method="post" action="{{ route('upload_user_photo',$profile->id) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="upload">Upload Photo</label>
            <input type="file" class="form-control-file" id="upload" name="photo">
            <span class="text-danger">{{ $errors->has('photo') ? $errors->first('photo') : '' }}</span>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="upload" class="btn btn-dark">
          </div>
        </form>
        @else
        <figure class="border p-1">
          <img class="img-fluid" width="100%" src="{{ asset('uploads/admin/'.$profile->photo) }}" alt="user img">
          <figcaption class="text-center">{{ $profile->first_name .' '. $profile->last_name }}</figcaption>
        </figure>
        <form class="mt-4" method="post" action="{{ route('update_photo',$profile->id) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="upload" class="text-danger">Update Photo</label>
            <input type="file" class="form-control-file" id="upload" name="photo">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Update" class="btn btn-dark">
          </div>
        </form>
        @endif
      </div>
      <div class="col-lg-9">
        <form action="{{ route('web_profile_update',$edit->id) }}" method="post">
          {{ csrf_field() }}
          <table class="table table-warning text-dark table-striped table-hover">
            <tr>
              <td class="w-40">First Name</td>
              <td class="w-10">:</td>
              <td class="w-50"><input type="text" class="form-control" name="first_name" value="{{ $edit->first_name }}"></td>
            </tr>
            <tr>
              <td class="w-40">Last Name</td>
              <td class="w-10">:</td>
              <td class="w-50"><input type="text" class="form-control" name="last_name" value="{{ $edit->last_name }}"></td>
            </tr>
            <tr>
              <td class="w-40">User Name</td>
              <td class="w-10">:</td>
              <td class="w-50"><input type="text" class="form-control" name="user_name" value="{{ $edit->user_name }}"></td>
            </tr>
            <tr>
              <td class="w-40">Email</td>
              <td class="w-10">:</td>
              <td class="w-50"><input type="text" class="form-control" name="email" value="{{ $edit->email }}"></td>
            </tr>
            <tr>
              <td class="w-40">Phone</td>
              <td class="w-10">:</td>
              <td class="w-50"><input type="text" class="form-control" name="phone" value="{{ $edit->phone }}"></td>
            </tr>
            <tr>
              <td class="w-40">Address</td>
              <td class="w-10">:</td>
              <td class="w-50"><input type="text" class="form-control" name="address" value="{{ $edit->address }}"></td>
            </tr>
            <tr>
              <td class="w-40">City</td>
              <td class="w-10">:</td>
              <td class="w-50"><input type="text" class="form-control" name="city" value="{{ $edit->city }}"></td>
            </tr>
          </table>
          <input type="submit" class="btn btn-dark" value="Update">
      </div>
      </form>
    </div>
  </div>
  </div>
  </div>
</section>
<div class="clearfix"></div>
<!-- end coding for customer satisfaction-->
@endsection