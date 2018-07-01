@extends('admin.master') 
@section('main-title') --::Edit User Contact::--
@endsection
 
@section('main-content')

<form role="form" action="{{ route('user_contact_update',$edit->id) }}" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title" style="float: left"><i class="fa fa-user"></i> User Contact edit</h3>
          <a href="{{ route('user_contact') }}" class="btn btn-info" style="float: right" onclick="return confirm('Are You sure to back')">Back</a>
        </div>
        <div class="clearfix"></div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                  <label for="name">Name<span class="text-danger">*</span></label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ $edit->name }}">
                  <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'is-invalid' : '' }}">
                  <!-- Default input email -->
                  <label for="email" class="grey-text">Email<span class="text-danger">*</span></label>
                  <input type="email" id="email" name="email" class="form-control" value="{{ $edit->email }}">
                  <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                </div>
                <br>
                <div class="form-group {{ $errors->has('subject') ? 'is-invalid' : '' }}">
                  <!-- Default input subject -->
                  <label for="Subject" class="grey-text">Subject<span class="text-danger">*</span></label>
                  <input type="text" name="subject" id="subject" class="form-control" value="{{ $edit->subject }}">
                  <span class="text-danger">{{ $errors->has('subject') ? $errors->first('subject') : '' }}</span>
                </div>
                <br>
                <div class="form-group {{ $errors->has('message') ? 'is-invalid' : '' }}">
                  <!-- Default textarea message -->
                  <label for="Message" class="grey-text">Message<span class="text-danger">*</span></label>
                  <textarea id="Message" name="message" class="form-control" rows="10" cols="6">{{ $edit->message }}</textarea>
                  <span class="text-danger">{{ $errors->has('message') ? $errors->first('message') : '' }}</span>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update User Contact</button>
          </div>
        </div>
        <!-- /.box -->
      </div>
    </div>
</form>
@endsection
 
@section('script')
@endsection