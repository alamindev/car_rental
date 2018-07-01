@extends('website.master') 
@section('title') --::your reservation::--
@endsection
 
@section('style')
<link rel="stylesheet" href="{{ asset('website-asset') }}/assets/select2/select2.min.css">
<link rel="stylesheet" href="{{ asset('website-asset') }}/assets/datepicker/datepicker3.css">
<link rel="stylesheet" href="{{ asset('website-asset') }}/assets/timepicker/bootstrap-timepicker.min.css">
@endsection
 
@section('main-content')
  @include('website.includes.bread')


<section class="reservation my-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center list">
        <h3>Your Reservation For Book a Car</h3>
      </div>
    </div>
    {{-- for service list --}}
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="reservation_main">
          <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
              <form action="{{ route('web_store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group" style="display: none;">
                  <label>car<span class="text-danger">*</span></label>
                  <input type="hidden" value="{{ $car->price_per_hour }}" name="price_per_hour">
                  <select class="form-control select2" name="car">
                        <option value="{{ $car->id }}" selected="selected" >{{ $car->car_name }}</option>  
                    </select>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group {{ $errors->has('pickupLocation') ? 'is-invalid' : '' }}">
                      <label>pickupLocation Location<span class="text-danger">*</span></label>
                      <select class="form-control select2" name="pickupLocation">
                          <option value="" selected="selected" disabled>select Branch </option>
                          @foreach($branches as $branch)
                          <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option> 
                          @endforeach
                          </select>
                      <span class="text-danger">{{ $errors->has('pickupLocation') ? $errors->first('pickupLocation') : '' }}</span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group {{ $errors->has('returnLocation') ? 'is-invalid' : '' }}">
                      <label>Return Location<span class="text-danger">*</span></label>
                      <select class="form-control select2" name="returnLocation">
                                    <option value="" selected="selected" disabled>select Branch </option>
                                    @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option> 
                                    @endforeach
                          </select>
                      <span class="text-danger">{{ $errors->has('returnLocation') ? $errors->first('returnLocation') : '' }}</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group {{ $errors->has('pickupDate') ? 'is-invalid' : '' }}">
                      <label>Pick Up Date<span class="text-danger">*</span></label>
                      <input type="text" name="pickupDate" class="datepicker form-control" value="{{ old('pickupDate') }}">
                      <span class="text-danger">{{ $errors->has('pickupDate ') ? $errors->first('pickupDate ') : '' }}</span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group {{ $errors->has('returnDate') ? 'is-invalid' : '' }}">
                      <label>Return Date<span class="text-danger">*</span></label>
                      <input type="text" name="returnDate" class="datepicker form-control" value="{{ old('returnDate') }}">
                      <span class="text-danger">{{ $errors->has('returnDate ') ? $errors->first('returnDate ') : '' }}</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group {{ $errors->has('pickupTime') ? 'is-invalid' : '' }}">
                      <div class="bootstrap-timepicker">
                        <div class="form-group">
                          <label>PickUp Time</label>
                          <div class="input-group">
                            <input type="text" class="form-control timepicker" name="pickupTime">
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      </div>
                      <span class="text-danger">{{ $errors->has('pickupTime ') ? $errors->first('pickupTime ') : '' }}</span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group {{ $errors->has('returnTime') ? 'is-invalid' : '' }}">
                      <!-- time Picker -->
                      <div class="bootstrap-timepicker">
                        <div class="form-group">
                          <label>Return Time</label>
                          <div class="input-group">
                            <input type="text" class="form-control timepicker" name="returnTime">
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      </div>
                      <span class="text-danger">{{ $errors->has('returnTime ') ? $errors->first('returnTime ') : '' }}</span>
                    </div>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('date ') ? 'is-invalid' : '' }}">
                  <label for="extra">Extra</label>
                  <input type="text" name="extra" placeholder="Example:- 5$" class="form-control">
                  <small class="text-danger text-capitalize">you can give extra price for booking</small>
                </div>
            </div>
            <div class="card-footer">
              <input type="submit" value="Order Now" class="button_btn_back">
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
 
@section('script')
<script src="{{ asset('website-asset') }}/assets/select2/select2.full.min.js"></script>
<script src="{{ asset('website-asset') }}/assets/datepicker/bootstrap-datepicker.js"></script>
<script src="{{ asset('website-asset') }}/assets/timepicker/bootstrap-timepicker.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){  
    $(".select2").select2();  
 $('.datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true
  }); 
   //Timepicker
   $(".timepicker").timepicker({
    showInputs: false
  });
  });

</script>
@endsection