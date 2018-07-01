@extends('admin.master') 
@section('main-title') --::User Contact Show Details::--
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" style="float: left"><i class="fa fa-user"></i> User Contact Show Detail's</h3>
        <a href="{{ route('user_contact') }}" class="btn btn-info" style="float: right">Contact</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <td>name</td>
            <td>:</td>
            <td>{{ $show_user_contact->name }}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $show_user_contact->email }}</td>
          </tr>
          <tr>
            <td>Subject</td>
            <td>:</td>
            <td>{{ $show_user_contact->subject }}</td>
          </tr>
          <tr>
            <td>Message</td>
            <td>:</td>
            <td>{{ $show_user_contact->message }}</td>
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