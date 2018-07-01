@extends('website.master') 
@section('title') --::{{ $profile->user_name }} Profile::--
@endsection
 
@section('main-content')
<div class="clearfix"></div>
<section class="mb-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="contact text-center mt-4">
          <h2 class="text-capitalize list">{{ $profile->user_name}} Profile</h2>
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
        <form class="mt-4" action="{{ route('upload_user_photo',$profile->id) }}" method="POST" enctype="multipart/form-data">
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
          <img class="img-fluid" width="100%" src="{{ asset('uploads/user/'.$profile->image) }}" alt="user img">
          <figcaption class="text-center">{{ $profile->first_name .' '. $profile->last_name }}</figcaption>
        </figure>
        <form class="mt-4" action="{{ route('update_photo',$profile->id) }}" method="POST" enctype="multipart/form-data">
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
        <table class="table table-warning text-dark table-striped table-hover">
          <tr>
            <td class="w-40">First Name</td>
            <td class="w-10">:</td>
            <td class="w-50">{{ $profile->first_name }}</td>
          </tr>
          <tr>
            <td class="w-40">Last Name</td>
            <td class="w-10">:</td>
            <td class="w-50">{{ $profile->last_name }}</td>
          </tr>
          <tr>
            <td class="w-40">User Name</td>
            <td class="w-10">:</td>
            <td class="w-50">{{ $profile->user_name }}</td>
          </tr>
          <tr>
            <td class="w-40">Email</td>
            <td class="w-10">:</td>
            <td class="w-50">{{ $profile->email }}</td>
          </tr>
          <tr>
            <td class="w-40">Phone</td>
            <td class="w-10">:</td>
            <td class="w-50">{{ $profile->phone }}</td>
          </tr>
          <tr>
            <td class="w-40">Address</td>
            <td class="w-10">:</td>
            <td class="w-50">{{ $profile->address }}</td>
          </tr>
          <tr>
            <td class="w-40">City</td>
            <td class="w-10">:</td>
            <td class="w-50">{{ $profile->city }}</td>
          </tr>
          <tr>
            <td class="w-40">Created Date</td>
            <td class="w-10">:</td>
            <td class="w-50">{{ carbon\carbon::parse($profile->created_at)->format('D jS M Y') }}</td>
          </tr>
        </table>
        <a href="{{ route('web_profile_edit',$profile->id) }}" class="btn btn-dark">Edit</a>
        <a href="{{ route('web_pass',$profile->id) }}" class="btn btn-dark">Update Password</a>
        <a href="{{ route('web_reservation_all') }}" class="btn btn-dark">Your Reservation</a>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>
<div class="clearfix"></div>
<!-- end coding for customer satisfaction-->
@endsection