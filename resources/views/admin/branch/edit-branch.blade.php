@extends('admin.master') 
@section('main-title') --::Edit Branch::--
@endsection
 
@section('style')
<link rel="stylesheet" href="{{ asset('admin-asset') }}/plugins/select2/select2.min.css">
@endsection
 
@section('main-content')
<form role="form" action="{{ route('branch-update',$edit->id) }}" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header pull-left">
          <h3 class="box-title">Edit Branch</h3>
        </div>
        <div class="box-header pull-right">
          <a href="{{ route('branch') }}" class="btn btn-info"><i class="fa fa-users"></i>&nbsp; Branchs</a>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}">
                  <label for="name">Branch Name<span class="text-danger">*</span></label>
                  <input type="text" name='name' class="form-control" id="name" value="{{ $edit->branch_name }}">
                  <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'is-invalid' : '' }}">
                  <label for="email">Email<span class="text-danger">*</span></label>
                  <input type="text" name='email' class="form-control" id="email" value="{{ $edit->email }}">
                  <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'is-invalid' : '' }}">
                  <label for="phone">Phone Number<span class="text-danger">*</span></label>
                  <input type="text" name='phone' class="form-control" id="phone" value="{{ $edit->phone }}">
                  <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('city') ? 'is-invalid' : '' }}">
                  <label> city <span class="text-danger">*</span></label>
                  <select class="form-control select2" name="city">
                          <option value="">Select a city</option> 
                          @foreach($cities as $city)
                          <option value="{{ $city->id }}"
                            @if($edit->city->id == $city->id)
                            selected
                            @endif
                            >{{ $city->city_name }}</option>
                          @endforeach
                        </select>
                  <span class="text-danger">{{ $errors->has('city') ? $errors->first('city') : '' }}</span>
                </div>
                <div class="form-group {{ $errors->has('city') ? 'is-invalid' : '' }}">
                  <label for="address">Address<span class="text-danger">*</span></label>
                  <textarea name="address" id="address" class="form-control" cols="60" rows="10">{{ $edit->address }}</textarea>
                  <span class="text-danger">{{ $errors->has('city') ? $errors->first('city') : '' }}</span>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-warning">Update</button>
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