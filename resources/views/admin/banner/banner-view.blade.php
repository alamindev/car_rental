@extends('admin.master')
@section('main-title')
	--:: view Logo And Title::--
@endsection
@section('main-content') 
	<div class="row">
        <div class="col-md-4"> 
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Add New Logo</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
            <form role="form" action="{{ route('post-banner') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
              @if(session('message'))
               <div id="message" class="alert alert-success">{{ session('message') }}</div>
              @endif 
                <div class="form-group">
                  <label for="image">banner</label>
                   <input type="file" name="banner" disabled> 
                </div>    
                <div class="form-group"> 
                   <img src="{{ asset('uploads/banner/banner.jpg') }}" class="img-responsive" width="290" alt="avatar">
                </div> 
              </div> 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" disabled>Add Banner</button>
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
              <h3 class="box-title">Logo and title list</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered"> 
                <tr>
                    <td>Banner</td>
                    <td>:</td>
                    <td>
                      @if($bannershow->banner)
                            <img src="{{ asset('uploads/banner/'.$bannershow->banner) }}" class="img-responsive" width="300" alt="logo">
                      @else
                          <img src="{{ asset('uploads/banner/banner.jpg') }}" class="img-responsive" width="400" alt="avatar">
                      @endif
                    </td>
                </tr>
                <tr>
                  <td>Created Date</td>
                  <td>:</td>
                  <td>
                    {{\Carbon\Carbon::parse($bannershow->created_at)->format('l jS M Y')}}
                  </td>
                </tr> 
                <tr>
                  <td>Back Button</td>
                  <td>:</td>
                  <td>
                    <a href="{{ route('banner') }}" class="btn btn-info" style="width: 100%">Back to list</a>
                  </td>
                </tr>
              </table>
            </div> 
          </div>
        </div> 
    </div>
@endsection 
