@extends('admin.master')
@section('main-title')
	--:: view social link::--
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
                  <input type="text" name='facebook' disabled class="form-control" id="facebook" placeholder="Enter Your facebook url">
                  <span class="text-danger">{{ $errors->has('facebook')? $errors->first('facebook'): '' }}</span>
                </div> 
                <div class="form-group {{ $errors->has('twitter') ? 'is-invalid' : '' }}">
                  <label for="twitter">twitter<span class="text-danger">*</span></label>
                  <input type="text" name='twitter' disabled class="form-control" id="twitter" placeholder="Enter Your twitter url">
                  <span class="text-danger">{{ $errors->has('twitter')? $errors->first('twitter'): '' }}</span>
                </div> 
                <div class="form-group {{ $errors->has('linkedin') ? 'is-invalid' : '' }}">
                  <label for="linkedin">linkedin<span class="text-danger">*</span></label>
                  <input type="text" name="linkedin" disabled class="form-control" id="linkedin" placeholder="Enter Your linkedin url">
                  <span class="text-danger">{{ $errors->has('linkedin')? $errors->first('linkedin'): '' }}</span>
                </div> 
                <div class="form-group {{ $errors->has('google') ? 'is-invalid' : '' }}">
                  <label for="google">google +<span class="text-danger">*</span></label>
                  <input type="text" name='google'  disabled class="form-control" id="google" placeholder="Enter Your google+ url">
                  <span class="text-danger">{{ $errors->has('google')? $errors->first('google'): '' }}</span>
                </div> 
                <div class="form-group {{ $errors->has('youtube') ? 'is-invalid' : '' }}">
                  <label for="youtube"> youtube<span class="text-danger">*</span></label>
                  <input type="text" name='youtube' disabled class="form-control" id="youtube" placeholder="Enter Your   youtube url">
                  <span class="text-danger">{{ $errors->has('youtube')? $errors->first('youtube'): '' }}</span>
                </div>  
              </div> 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" disabled>Add Social</button>
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
              <table class="table table-bordered">
                <tr>
                    <td>facebook</td>
                    <td>:</td>
                    <td>{{ $social_show->facebook }}</td>
                </tr>  
                <tr>
                    <td>twitter</td>
                    <td>:</td>
                    <td>{{ $social_show->twitter }}</td>
                </tr>  
                 <tr>
                    <td>linkedin</td>
                    <td>:</td>
                    <td>{{ $social_show->linkedin }}</td>
                </tr>  
                 <tr>
                    <td>google+</td>
                    <td>:</td>
                    <td>{{ $social_show->google }}</td>
                </tr>   
                <tr>
                    <td>google+</td>
                    <td>:</td>
                    <td>{{ $social_show->youtube }}</td>
                </tr>  
                <tr>
                  <td>Back Button</td>
                  <td>:</td>
                  <td>
                    <a href="{{ route('social') }}" class="btn btn-info" style="width: 100%">Back to list</a>
                  </td>
                </tr>
              </table>
            </div> 
          </div>
        </div> 
    </div>
@endsection 
