@extends('admin.master') 
@section('main-title') -:: All Reservation ::-
@endsection
 
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title" style="float: left">All reservation list</h3>
                <div class="clearfix"></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('delete'))
                <div class="text-center alert alert-danger deletes">Reservation Deleted SuccessFully!</div>
                @endif
                <table class="table table-bordered load" id="datatable">
                    <thead>
                        <tr>
                            <th style="width: 10px">Serial</th>
                            <th>Customer Name</th>
                            <th>Car Name</th>
                            <th>price</th>
                            <th>Confirm</th>
                            <th>Paid</th>
                            <th>Complate</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; 
@endphp @foreach($reservations as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                                @if(!empty($data->users)) {{ $data->users->user_name }} @endif
                            </td>
                            <td>
                                @if(!empty($data->cars)) {{ $data->cars->car_name }} @endif
                            </td>
                            <td>
                                {{ $data->price }} <strong>$</strong>
                            </td>
                            <td>
                                @if($data->isPending == 0)
                                <button class="btn btn-primary" id='pending' data-id="{{ $data->id }}">Pending</button> @else
                                <button class="btn btn-success" disabled id='pending' data-id="{{ $data->id }}">Delivered</button>                                @endif
                            </td>
                            <td>
                                @if($data->isPaid == 0)
                                <button class="btn btn-primary" id='paid' data-id="{{ $data->id }}" @if($data->isPending == 0) disabled @endif
                                    >UnPaid</button> @else
                                <button class="btn btn-success" disabled>Paid</button> @endif
                            </td>
                            <td>
                                @if($data->isComplated == 0)
                                <button class="btn btn-info" id='complate' data-id="{{ $data->id }}" @if($data->isPaid == 0) disabled @endif
                                        >Running Delivery</button> @else
                                <button class="btn btn-success" disabled id='pending' data-id="{{ $data->id }}">Complated</button>                                @endif
                            </td>
                            <td>
                                <a href="{{ route('reservation-view',['id'=>$data->id]) }}"> <i class="fa fa-eye view"></i></a>
                                <a href="{{ route('reservation-destroy',['id'=>$data->id]) }}" onclick="return confirm('Are You Sure Delete This! ')"> <i class="fa fa-trash delete"></i></a>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
//for remove alert

$(function(){ 
    $('#datatable').DataTable( ); 
    setTimeout(function(){
      $('.deletes').fadeOut(1000);
    },2000);




  {{--  for ajax  --}}
  // for delete category
  $(document).on('click','#pending',function(){ 
    var id = $(this).data('id');  
    $.ajax({
      type: 'GET',
      url:'reservation/pending/'+id,
      success: function(data){
         $('.load').load(location.href + ' .load');  
      }
    });
  }); 
  // for delete category
  $(document).on('click','#paid',function(){ 
    var id = $(this).data('id');  
    $.ajax({
      type: 'GET',
      url:'reservation/paid/'+id,
      success: function(data){
         $('.load').load(location.href + ' .load');  
      }
    });
  }); 
  // for delete category
  $(document).on('click','#complate',function(){ 
    var id = $(this).data('id');  
    $.ajax({
      type: 'GET',
      url:'reservation/complate/'+id,
      success: function(data){
         $('.load').load(location.href + ' .load');  
      }
    });
  });
});

</script>
@endsection