@extends('admin.master')
@section('main-title')
 --:: Edit About Detail's ::--
@endsection 
@section('main-content') 
 <form role="form" action="{{ route('update-about',$edit->id) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
        <div class="col-md-12"> 
          <div class="box box-danger">
            <div class="box-header">
            <h3 class="box-title pull-left">Edit about info</h3>
            <a href="{{ route('about') }}" class="btn btn-info pull-right"> <i class="fa fa-backward "></i> back</a>
            </div>
            <div class="clearfix"></div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12"> 
                    <div class="box-body">
                      <div class="form-group">
                        <label for="title">title<span class="text-danger">*</span></label>
                        <input type="text" name='title' class="form-control" id="title" value="{{ $edit->title }}"> 
                      </div>
                      <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo">
                      </div>
                      <div class="form-group">
                        <label>Photo</label>
                        <img src="{{ asset('uploads/about/'.$edit->photo) }}" width="200" alt="avatar">
                      </div>
                      <div class="form-group">
                          <label>Description</label>
                           <textarea id="editor" name="detail" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $edit->detail }}</textarea> 
                      </div> 
                    </div> 
                </div> 
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer"> 
              <button type="submit" class="btn btn-primary">Update Detail's</button> 
            </div>
          </div>
          <!-- /.box --> 
        </div> 
    </div> 
  </form>
@endsection
@section('script')  
<script src="{{ asset('admin-asset') }}/plugins/ckeditor/ckeditor.js"></script> 
<script type="text/javascript">  
  $(document).ready(function(){
    CKEDITOR.replace('editor');  
  }); 
</script>
@endsection
