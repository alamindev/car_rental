@extends('admin.master')
@section('main-title')
	--::about show::--
@endsection
@section('main-content') 
	<div class="row"> 
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" style="float: left">about show</h3>
             <a href="{{ route('about') }}" class="btn btn-success" style="float: right">about</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td> Title</td>
                  <td>:</td>
                  <td> {{ $about_show->title ? $about_show->title : "you have now title" }} 
                  </td>
                </tr>                  
                <tr>
                  <td>Description</td>
                  <td>:</td>
                  <td>{!! $about_show->detail !!}</td>
                </tr>               
                 <tr>
                  <td>Photo</td>
                  <td>:</td>
                  <td>
                    @if($about_show->photo) 
                        <img src="{{ asset('uploads/about/'.$about_show->photo) }}" width="200">
                    @else
                      No image
                    @endif
                  </td>
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
