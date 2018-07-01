@extends('website.master') 
@section('title') Reservation
@endsection
 
@section('style')
<link rel="stylesheet" href="{{ asset('website-asset') }}/assets/datatables/dataTables.bootstrap.min.css ">
@endsection
 
@section('main-content')
  @include('website.includes.bread')

<section class="reservation mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center list">
        <h3>Your Reservation</h3>
      </div>
    </div>
    {{-- for service list --}}
    <div class="row mb-5">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header py-4">
            <a href="{{ route('web_profile',auth()->user()->id) }}" class="button_btn">back</a>
          </div>
          <div class="card-body">
            <table id="datatable" class="table table-striped table-active table-bordered table-primary">
              <thead>
                <th>
                  <td>Car Name</td>
                  <td>Price</td>
                  <td>Pickup Date Time</td>
                  <td>Return Date Time</td>
                  <td>Approved</td>
                  <td>Paid</td>
                </th>
              </thead>
              <tbody>
                @php $i=1; 
@endphp @foreach($reservations as $data)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $data->cars->car_name }}</td>
                  <td>{{ $data->price }} $</td>
                  <td>{{ Carbon\Carbon::parse($data->pickupDate . ' ' . $data->pickupTime)->format('Y-m-d h:i:s A') }}</td>
                  <td>{{ Carbon\Carbon::parse($data->returnDate . ' ' . $data->returnTime)->format('Y-m-d h:i:s A') }}</td>
                  <td>
                    @if($data->isPending == 0) Pending @else Approved @endif
                  </td>
                  <td>
                    @if($data->isPaid == 0) Unpaid @else Paid @endif
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
 
@section('script')
<script src="{{ asset('website-asset') }}/assets/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('website-asset') }}/assets/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () { 
      $('#datatable').DataTable(); 
    });

</script>
@endsection