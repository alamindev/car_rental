@extends('admin.master') 
@section('main-title') --:: view Branch ::--
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="box box-success">
      <div class="box-header pull-left">
        <h3 class="box-title">view Branch</h3>
      </div>
      <div class="box-header pull-right">
        <a href="{{ route('branchs') }}" class="btn btn-info"><i class="fa fa-users"></i>&nbsp; Branchs</a>
      </div>
      <div class="clearfix"></div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover table-striped">
              <tr>
                <td>Branch Name</td>
                <td>:</td>
                <td>{{ $view->branch_name }}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $view->email }}</td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td>{{ $view->phone }}</td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td>{{ $view->address }}</td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td>{{ $view->city->city_name }}</td>
              </tr>
              <tr>
                <td>Postal Code</td>
                <td>:</td>
                <td>{{ $view->city->postal_code }}</td>
              </tr>
              <tr>
                <td>Created Date</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($view->created_at)->format('l jS M Y')}}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection