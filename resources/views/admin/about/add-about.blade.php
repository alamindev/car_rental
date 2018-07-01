@extends('admin.master')
@section('main-title')
  --::Add About::--
@endsection 
@section('main-content') 
 <form role="form" action="{{ route('store-about') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
        <div class="col-md-12"> 
          <div class="box box-danger">
            <div class="box-header">
            <h3 class="box-title pull-left">Add about info</h3> 
            </div>
            <div class="clearfix"></div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12"> 
                    <div class="box-body">
                      <div class="form-group">
                        <label for="title">title<span class="text-danger">*</span></label>
                        <input type="text" name='title' class="form-control" id="title" placeholder="Write a post title"> 
                      </div>
                      <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo"> 
                        <small class="text-danger text-capitalize">no require if you want!</small>
                      </div>
                      <div class="form-group">
                          <label>Description</label>
                           <textarea id="editor" name="detail" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> 
                           <span class="text-danger">{{ $errors->has('detail') ? $errors->first('detail') : '' }}</span>
                      </div> 
                    </div> 
                </div> 
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer"> 
              <button type="submit" class="btn btn-primary">Add About</button> 
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
