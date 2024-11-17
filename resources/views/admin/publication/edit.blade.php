@extends('layouts.admin')
@section('admin_content')
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Publication</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Publication</li>
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
       <form action="{{route('publication.update')}}" method="post" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="id" value="{{$data->id}}">
       	<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Publication</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Publication Name <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="publication_name" value="{{$data->publication_name}}"  required="">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Editor Name <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="editor_name" value="{{$data->editor_name}}">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Editor Title <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="editor_title" value="{{$data->editor_title}}">
                      <small id="emailHelp" class="form-text text-muted">editor's note title</small>
                    </div>
                  </div>
                   <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Editor Designation <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="editor_desig" value="{{$data->editor_desig}}">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Editor Department <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="editor_dept" value="{{$data->editor_dept}}">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Editor Institute</label>
                      <input type="text" class="form-control" name="editor_inst" value="{{$data->editor_inst}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Chief Editor Name</label>
                      <input type="text" class="form-control" name="chiefeditor_name" value="{{$data->chiefeditor_name}}">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Chief Editor Designation</label>
                      <input type="text" class="form-control" name="chiefeditor_desig" value="{{$data->chiefeditor_desig}}">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Chief Editor Department</label>
                      <input type="text" class="form-control" name="chiefeditor_dept" value="{{$data->chiefeditor_dept}}">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Chief Editor Institute</label>
                      <input type="text" class="form-control" name="chiefeditor_inst" value="{{$data->chiefeditor_inst}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Chief Patron Title <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="chiefpatron_title" value="{{$data->chiefpatron_title}}">
                      <small id="emailHelp" class="form-text text-muted">chief patron title</small>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Chief Patron Name</label>
                      <input type="text" class="form-control" name="chiefpatron_name" value="{{$data->chiefpatron_name}}">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Chief Patron Designation</label>
                      <input type="text" class="form-control" name="chiefpatron_desig" value="{{$data->chiefpatron_desig}}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Chief Patron Institute <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="chiefpatron_inst" value="{{$data->chiefpatron_inst}}">
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Chief Patron Department</label>
                      <input type="text" class="form-control" name="chiefpatron_dept" value="{{$data->chiefpatron_dept}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Name</label>
                      <input type="text" class="form-control" name="chipatron_name" value="{{$data->chipatron_name}}">
                      <small id="emailHelp" class="form-text text-muted">chief patron name for editorial board title</small>
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Designation</label>
                      <input type="text" class="form-control" name="chipatron_desig" value="{{$data->chipatron_desig}}">
                      <small id="emailHelp" class="form-text text-muted">chief patron designation for editorial board title</small>
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Department</label>
                      <input type="text" class="form-control" name="chipatron_dept" value="{{$data->chipatron_dept}}">
                      <small id="emailHelp" class="form-text text-muted">chief patron department for editorial board title</small>
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Institute</label>
                      <input type="text" class="form-control" name="chipatron_inst" value="{{$data->chipatron_inst}}">
                      <small id="emailHelp" class="form-text text-muted">chief patron institute for editorial board title</small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Patron Name</label>
                      <input type="text" class="form-control" name="patron_name" value="{{$data->patron_name}}">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Patron Designation</label>
                      <input type="text" class="form-control" name="patron_desig" value="{{$data->patron_desig}}">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Patron Department</label>
                      <input type="text" class="form-control" name="patron_dept" value="{{$data->patron_dept}}">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Patron Institute</label>
                      <input type="text" class="form-control" name="patron_inst" value="{{$data->patron_inst}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
    	        		    <label for="exampleInputPassword1">Status</label>
    		              <select class="form-control" name="status">
    		                <option value="1" @if($data->status==1) selected @endif>Yes</option>
    		                <option value="0" @if($data->status==0) selected @endif>No</option>
    		              </select>
    		             <small id="emailHelp" class="form-text text-muted">If yes it will be show on frontend</small>
  		        	    </div>
                    <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Issue Date <span class="text-danger">*</span> </label>
                      <input type="date" class="form-control" name="issue_date" value="{{$data->issue_date}}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label for="exampleInputPassword1">Chief Patron Message</label>
                      <textarea class="form-control textarea" id="summernote" name="chiefpatron_message">{{$data->chiefpatron_message}}</textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label for="exampleInputPassword1">Editor' Note</label>
                      <textarea class="form-control textarea" id="summer" name="editor_note">{{$data->editor_note}}</textarea>
                    </div>
                  </div>
                <div class="row">
		        	<div class="form-group col-lg-6">
	            		<label for="exampleInputEmail1">Publication Image<span class="text-danger">*</span></label><br>
	                    <input type="file" name="publication_image" accept="image/*" class="dropify">
	                    <input type="hidden" name="old_image" value="{{$data->publication_image}}">
	                    <img src="{{asset($data->publication_image)}}" style="height: 50px; width: 50px;">
	            	</div>
		        	<div class="form-group col-lg-6">
	            		<label for="exampleInputEmail1">Publication File<span class="text-danger">*</span></label><br>
	                    <input type="file" name="publication_file" class="dropify">
	                    <input type="hidden" name="old_file" value="{{$data->publication_file}}">
	            	</div>
	            </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </div>
            <!-- /.card -->
         </div>
         <button type="submit" class="btn btn-info ml-2 mb-3 col-lg-12">Update</button>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

<script type="text/javascript">
  $('.dropify').dropify();  //dropify image
  $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    }); 

</script>


@endsection
