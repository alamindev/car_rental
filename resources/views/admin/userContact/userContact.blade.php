@extends('admin.master') 
@section('main-title') --::User Contact::--
@endsection
 
@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title text-info" style="float: left"> <i class="fa fa-users"></i> UserContact</h3>
      </div>
      <div class="clearfix"></div>
      @if(Session::has('update'))
      <p class="alert alert-info update text-center"> user Contact Update Successfully Complated!</p>
      @endif
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered" id="datatable">
          <thead>
            <tr>
              <th style="width: 10px">Serial</th>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Contact Date</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 1; 
@endphp @foreach($userContacts as $contact)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $contact->name }}</td>
              <td>{{ $contact->email }}</td>
              <td>{{ $contact->subject }}</td>
              <td>{{ Carbon\Carbon::parse($contact->created_at)->format('d-m-y') }}</td>
              <td width="100">
                <a href="{{ route('user_contact_show',[" id "=>$contact->id ]) }}" class="text-success"> <i class="fa fa-eye view"></i></a>
                <a href="{{ route('user_contact_edit',['id'=>$contact->id]) }}"> <i class="fa fa-edit edit"></i></a>
                <a href="{{ route('user_contact_destroy',['id'=>$contact->id]) }}" onclick="return confirm('Are You Sure Delete This! ')"> <i class="fa fa-trash delete"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('script')
<script type="text/javascript">
  $(function () {  
    $('#datatable').DataTable( );
    setTimeout(function(){
      $('.update').fadeOut(1000);
    },1000);    
  });

</script>
@endsection