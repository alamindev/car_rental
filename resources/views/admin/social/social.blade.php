@extends('admin.master')
@section('main-title')
	--::Social link::--
@endsection
@section('main-content') 
	<div class="row">
        <div class="col-md-4"> 
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Add Social</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
             <form role="form" action="{{ route('store-social') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
              @if(session('message'))
               <div id="message" class="alert alert-success">{{ session('message') }}</div>
              @endif
                <div class="form-group {{ $errors->has('facebook') ? 'is-invalid' : '' }}">
                  <label for="facebook">facebook<span class="text-danger">*</span></label>
                  <input type="text" name='facebook' class="form-control" id="facebook" placeholder="Enter Your facebook url">
                  <span class="text-danger">{{ $errors->has('facebook')? $errors->first('facebook'): '' }}</span>
                </div> 
                <div class="form-group {{ $errors->has('twitter') ? 'is-invalid' : '' }}">
                  <label for="twitter">twitter<span class="text-danger">*</span></label>
                  <input type="text" name='twitter' class="form-control" id="twitter" placeholder="Enter Your   twitter url">
                  <span class="text-danger">{{ $errors->has('twitter')? $errors->first('twitter'): '' }}</span>
                </div> 
                <div class="form-group {{ $errors->has('linkedin') ? 'is-invalid' : '' }}">
                  <label for="linkedin">linkedin<span class="text-danger">*</span></label>
                  <input type="text" name='linkedin' class="form-control" id="linkedin" placeholder="Enter Your linkedin url">
                  <span class="text-danger">{{ $errors->has('linkedin')? $errors->first('linkedin'): '' }}</span>
                </div> 
                <div class="form-group {{ $errors->has('google') ? 'is-invalid' : '' }}">
                  <label for="google">google +<span class="text-danger">*</span></label>
                  <input type="text" name='google' class="form-control" id="google" placeholder="Enter Your google+ url">
                  <span class="text-danger">{{ $errors->has('google')? $errors->first('google'): '' }}</span>
                </div> 
                <div class="form-group {{ $errors->has('youtube') ? 'is-invalid' : '' }}">
                  <label for="youtube"> youtube<span class="text-danger">*</span></label>
                  <input type="text" name='youtube' class="form-control" id="youtube" placeholder="Enter Your   youtube url">
                  <span class="text-danger">{{ $errors->has('youtube')? $errors->first('youtube'): '' }}</span>
                </div>  
              </div> 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Social</button>
              </div>
            </form> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --> 
        </div>
        <!-- /.col (left) -->  
        <div class="col-md-8">
          <div class="box  box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">social link list</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               @if(session('delete'))
               <div id="message" class="alert alert-danger">{{ session('delete') }}</div>
              @endif
              <table class="table table-bordered" id="datatable">
                <thead>
                  <tr>
                    <th style="width: 10px">Serial</th>
                    <th>facebook</th>
                    <th>twitter</th>
                    <th>Manage</th> 
                   </tr>
                </thead>
                <tbody>
                  @php 
                   $i= 1;
                  @endphp
                  @foreach($social as $data)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->facebook }}</td> 
                    <td> {{ $data->twitter }} </td>
                    <td>
                        <a href="{{ route('show-social',['id'=>$data->id]) }}"> <i class="fa fa-eye view"></i></a>
                          @foreach(auth::user()->roles as $role) 
                      @if($role->name = 'SupperAdmin')
                       <a href="{{ route('edit-social',['id'=>$data->id]) }}"> <i class="fa fa-edit edit"></i></a>
                      @endif 
                   @endforeach
                        
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
  $(function(){
      $('#datatable').DataTable();
      setTimeout(function(){
        $('#message').fadeOut('slow');
      },2000);
  });
</script>
@endsection
