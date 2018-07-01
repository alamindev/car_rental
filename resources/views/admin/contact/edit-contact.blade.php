@extends('admin.master') 
@section('main-title') --::Edit Contact::--
@endsection
 
@section('main-content')
<form role="form" action="{{ route('update-contact',$edit->id) }}" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title" style="float: left">Update Contact</h3>
          <a href="{{ route('contact') }}" class="btn btn-success" style="float: right">Contact</a>
        </div>
        <div class="clearfix"></div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
                  <label for="title">Title</label>
                  <input type="text" id="title" name="title" class="form-control" value="{{ $edit->title }}">
                  <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('reg_address') ? 'is-invalid' : '' }}">
                  <label for="reg_address">Register Address</label>
                  <input type="text" id="reg_address" name="reg_address" class="form-control" value="{{ $edit->reg_address }}">
                  <span class="text-danger">{{ $errors->has('reg_address') ? $errors->first('reg_address') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('email_address') ? 'is-invalid' : '' }}">
                  <label for="email_address">Email Address</label>
                  <input type="text" id="email_address" name="email_address" class="form-control" value="{{ $edit->email_address }}">
                  <span class="text-danger">{{ $errors->has('email_address') ? $errors->first('email_address') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('call_us') ? 'is-invalid' : '' }}">
                  <label for="call_us">Call Us</label>
                  <input type="text" id="call_us" name="call_us" class="form-control" value="{{ $edit->call_us }}">
                  <span class="text-danger">{{ $errors->has('call_us') ? $errors->first('call_us') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('sms') ? 'is-invalid' : '' }}">
                  <label for="sms">SMS</label>
                  <input type="text" id="sms" name="sms" class="form-control" value="{{ $edit->sms }}">
                  <span class="text-danger">{{ $errors->has('sms') ? $errors->first('sms') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('google_link') ? 'is-invalid' : '' }}">
                  <label for="google_link">Google Link</label>
                  <input type="text" id="title" name="google_link" class="form-control" value="{{ $edit->google_link }}">
                  <span class="text-danger">{{ $errors->has('google_link') ? $errors->first('google_link') : '' }}</span>
                </div>
                <div class="form-group ">
                  <h3>Openning Hour</h3>
                </div>
                <div class="form-group {{ $errors->has('open_day_1') ? 'is-invalid' : '' }}">
                  <label for="open_day_1">Openning Day 1</label>
                  <input type="text" id="open_day_1" name="open_day_1" class="form-control" value="{{ $edit->open_day_1 }}">
                  <span class="text-danger">{{ $errors->has('open_day_1') ? $errors->first('open_day_1') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('open_time_1') ? 'is-invalid' : '' }}">
                  <label for="open_time_1">Openning Time 1</label>
                  <input type="text" id="open_time_1" name="open_time_1" class="form-control" value="{{ $edit->open_time_1 }}">
                  <span class="text-danger">{{ $errors->has('open_time_1') ? $errors->first('open_time_1') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('open_day_2') ? 'is-invalid' : '' }}">
                  <label for="open_day_2">Openning Day 2</label>
                  <input type="text" id="open_day_2" name="open_day_2" class="form-control" value="{{ $edit->open_day_2 }}">
                  <span class="text-danger">{{ $errors->has('open_day_2') ? $errors->first('open_day_2') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('open_time_2') ? 'is-invalid' : '' }}">
                  <label for="open_time_2">Openning Time 2</label>
                  <input type="text" id="open_time_2" name="open_time_2" class="form-control" value="{{ $edit->open_time_2 }}">
                  <span class="text-danger">{{ $errors->has('open_time_2') ? $errors->first('open_time_2') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('open_day_3') ? 'is-invalid' : '' }}">
                  <label for="open_day_3">Openning Day 3</label>
                  <input type="text" id="open_day_3" name="open_day_3" class="form-control" value="{{ $edit->open_day_3 }}">
                  <span class="text-danger">{{ $errors->has('open_day_3') ? $errors->first('open_day_3') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('open_time_3') ? 'is-invalid' : '' }}">
                  <label for="open_time_3">Openning Time 2</label>
                  <input type="text" id="open_time_3" name="open_time_3" class="form-control" value="{{ $edit->open_time_3 }}">
                  <span class="text-danger">{{ $errors->has('open_time_3') ? $errors->first('open_time_3') : '' }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Update contact</button>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</form>
@endsection
 
@section('script')
@endsection