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
             <form role="form" action="{{ route('post-logoandtitle') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
              @if(session('message'))
               <div id="message" class="alert alert-success">{{ session('message') }}</div>
              @endif
                <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
                  <label for="title">Header Title<span class="text-danger">*</span></label>
                  <input type="text" name='title' class="form-control" id="title" placeholder="Enter Your header title">
                  <span class="text-danger">{{ $errors->has('title')? $errors->first('title'): '' }}</span>
                </div>
                <div class="form-group">
                  <label for="image">Images</label>
                   <input type="file" name="logo">
                   <span class="text-danger">{{ $errors->has('logo')? $errors->first('logo'): '' }}</span>
                </div>    
                <div class="form-group"> 
                   <img src="{{ asset('uploads/avatar_1.png') }}" width="200" alt="avatar">
                </div> 
              </div> 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Title & Logo</button>
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
                    <td>Title</td>
                    <td>:</td>
                    <td>{{ $logoTitleShow->title }}</td>
                </tr> 
                <tr>
                    <td>Logo</td>
                    <td>:</td>
                    <td>
                      @if($logoTitleShow->logo)
                            <img src="{{ asset('uploads/logo/'.$logoTitleShow->logo) }}" width="300" alt="logo">
                      @else
                          <img src="{{ asset('uploads/avatar_1.png') }}" width="200" alt="avatar">
                      @endif
                    </td>
                </tr>
                <tr>
                  <td>Created Date</td>
                  <td>:</td>
                  <td>
                    {{\Carbon\Carbon::parse($logoTitleShow->created_at)->format('l jS M Y')}}
                  </td>
                </tr> 
                <tr>
                  <td>Back Button</td>
                  <td>:</td>
                  <td>
                    <a href="{{ route('logoandtitle') }}" class="btn btn-info" style="width: 100%">Back to list</a>
                  </td>
                </tr>
              </table>
            </div> 
          </div>
        </div> 
    </div>
@endsection 
