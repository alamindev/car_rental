@extends('admin.master')
@section('main-title')
  --::show loan::--
@endsection
@section('main-content') 
  <div class="row"> 
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" style="float: left">show loan</h3>
             <a href="{{ route('loans') }}" class="btn btn-success" style="float: right">all loans</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" id="datatable">
                <tr>
                  <td>loan Title</td>
                  <td>:</td>
                  <td>{{ $loan->title }}</td>
                </tr>   
                 <tr>
                  <td>icon</td>
                  <td>:</td>
                  <td>{{ $loan->icon }}</td>
                </tr>                
                <tr>
                  <td>loan detail's</td>
                  <td>:</td>
                  <td>{!! $loan->detail !!}</td>
                </tr> 
                 <tr>
                  <td>create date</td>
                  <td>:</td>
                 <td>{{ \Carbon\Carbon::parse($loan->created_at)->format('D jS M Y') }}</td>
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
