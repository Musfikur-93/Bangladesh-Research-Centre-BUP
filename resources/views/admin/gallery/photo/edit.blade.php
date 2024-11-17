@extends('layouts.admin')
@section('admin_content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<style type="text/css">
  .bootstrap-tagsinput .tag {
    background: #428bca;;
    border: 1px solid white;
    padding: 1 6px;
    padding-left: 2px;
    margin-right: 2px;
    color: white;
    border-radius: 4px;
  }
</style>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Photo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Photo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <form action="{{route('photo.update')}}" method="post" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="id" value="{{ $data->id }}">
       	<div class="row">
          <!-- left column -->
          <div class="col-lg-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Photo</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                  	<div class="form-group">
	                    <img src="{{asset($data->thumbnail)}}" style="height: 50px; width: 50px;">
	                    <label for="exampleInputEmail1"> Thumbnail <span class="text-danger">*</span></label><br>
	                    <input type="file" name="thumbnail" accept="image/*" class="dropify">
	                    <input type="hidden" name="old_thumbnail" value="{{ $data->thumbnail }}">
                   </div>
                    <div class="form-group col-lg-12">
                      <label for="exampleInputEmail1">Title <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}" required>
                    </div>
                    <div class="form-group col-lg-12">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea class="form-control" name="description" id="summernote">{{ $data->description }}</textarea>
                    </div>
                    <div class="form-group col-lg-12">
                    <table class="table table-bordered" id="dynamic_field">
                    <div class="card-header">
                      <h3 class="card-title">More Images (Click Add For More Image)</h3>
                    </div>
                      <tr>
                          <td><input type="file" accept="image/*" name="images[]" class="form-control name_list" /></td>
                          <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
                      </tr>
                        @php
                          $images= json_decode($data->images,true);
                        @endphp
                          @if(!$images)
                          @else
                        <div class="row">
                          @foreach($images as $key=>$image)
                            <div class="col-md-4">
                              <img alt="" src="{{asset('public/files/gallery/'.$image)}}" style="width: 100px; height: 80px; padding: 10px;"/>
                              <input type="hidden" name="old_images[]" value="{{ $image }}">
                              <button type="button" class="remove-files" style="border:none;">X</button>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </table>
                  </div>
                  <div class="form-group col-lg-12">
                    <h6>Status</h6>
                   <input type="checkbox" name="status" value="1" @if($data->status==1) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
                 </div>

                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </div>
            <!-- /.card -->
           <button type="submit" class="btn btn-info ml-2 mb-3">Update</button>
         </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('public/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script type="text/javascript">
  $('.dropify').dropify();  //dropify image
  $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    $(document).ready(function(){
       var postURL = "<?php echo url('addmore'); ?>";
       var i=1;


       $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" accept="image/*" name="images[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
       });

       $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
       });
     });

   
     //edit product image remove by cross button
        $('.remove-files').on('click',function(){
          $(this).parents(".col-md-4").remove();
        });

</script>
@endsection
