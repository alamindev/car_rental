@extends('admin.master') 
@section('main-title') --::Contact Show Detail::--
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" style="float: left">Contact Show Detail's</h3>
        <a href="{{ route('contact') }}" class="btn btn-success" style="float: right">Contact</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <td>Title</td>
            <td>:</td>
            <td>{{ $show_contact->title }}</td>
          </tr>
          <tr>
            <td>Register Address</td>
            <td>:</td>
            <td>{{ $show_contact->reg_address }}</td>
          </tr>
          <tr>
            <td>Email Address</td>
            <td>:</td>
            <td>{{ $show_contact->email_address }}</td>
          </tr>
          <tr>
            <td>Call us</td>
            <td>:</td>
            <td>{{ $show_contact->call_us }}</td>
          </tr>
          <tr>
            <td>sms</td>
            <td>:</td>
            <td>{{ $show_contact->sms }}</td>
          </tr>
          <tr>
            <td>Google Map Link</td>
            <td>:</td>
            <td>{{ $show_contact->google_link }}</td>
          </tr>
          <tr>
            <td>Openning Day 1</td>
            <td>:</td>
            <td>{{ $show_contact->open_day_1 }}</td>
          </tr>
          <tr>
            <td>Openning time 1</td>
            <td>:</td>
            <td>{{ $show_contact->open_time_1 }}</td>
          </tr>
          <tr>
            <td>Openning Day 1</td>
            <td>:</td>
            <td>{{ $show_contact->open_day_2 }}</td>
          </tr>
          <tr>
            <td>Openning time 1</td>
            <td>:</td>
            <td>{{ $show_contact->open_time_2 }}</td>
          </tr>
          <tr>
            <td>Openning Day 1</td>
            <td>:</td>
            <td>{{ $show_contact->open_day_3 }}</td>
          </tr>
          <tr>
            <td>Openning time 1</td>
            <td>:</td>
            <td>{{ $show_contact->open_time_3 }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('script')
<script type="text/javascript">

</script>
@endsection