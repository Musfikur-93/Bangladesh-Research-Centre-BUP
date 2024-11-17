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
              <li class="breadcrumb-item active">Add Publication</li>
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
       <form action="{{route('publication.store')}}" method="post" enctype="multipart/form-data">
         @csrf
       	<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Publication</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Publication Name <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="publication_name" {{old('publication_name')}} required="">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Editor Title <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="editor_title" {{old('editor_title')}}>
                      <small id="emailHelp" class="form-text text-muted">editor's note title</small>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Editor Name <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="editor_name" required="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Editor Designation</label>
                      <input type="text" class="form-control" name="editor_desig">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Editor Department</label>
                      <input type="text" class="form-control" name="editor_dept">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Editor Institute</label>
                      <input type="text" class="form-control" name="editor_inst">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Chief Editor Name</label>
                      <input type="text" class="form-control" name="chiefeditor_name" required="">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Chief Editor Designation</label>
                      <input type="text" class="form-control" name="chiefeditor_desig">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Chief Editor Department</label>
                      <input type="text" class="form-control" name="chiefeditor_dept">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Chief Editor Institute</label>
                      <input type="text" class="form-control" name="chiefeditor_inst">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Chief Patron Name</label>
                      <input type="text" class="form-control" name="chiefpatron_name" required="">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Chief Patron Title</label>
                      <input type="text" class="form-control" name="chiefpatron_title" {{old('chiefpatron_title')}}>
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Chief Patron Designation</label>
                      <input type="text" class="form-control" name="chiefpatron_desig">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Chief Patron Department</label>
                      <input type="text" class="form-control" name="chiefpatron_dept">
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Chief Patron Institute</label>
                      <input type="text" class="form-control" name="chiefpatron_inst">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Name</label>
                      <input type="text" class="form-control" name="chipatron_name" required="">
                      <small id="emailHelp" class="form-text text-muted">chief patron name for editorial board title</small>
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Designation</label>
                      <input type="text" class="form-control" name="chipatron_desig">
                      <small id="emailHelp" class="form-text text-muted">chief patron designation for editorial board title</small>
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Department</label>
                      <input type="text" class="form-control" name="chipatron_dept">
                      <small id="emailHelp" class="form-text text-muted">chief patron department for editorial board title</small>
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Institute</label>
                      <input type="text" class="form-control" name="chipatron_inst">
                      <small id="emailHelp" class="form-text text-muted">chief patron institute for editorial board title</small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Patron Name</label>
                      <input type="text" class="form-control" name="patron_name" required="">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputPassword1">Patron Designation</label>
                      <input type="text" class="form-control" name="patron_desig">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Patron Department</label>
                      <input type="text" class="form-control" name="patron_dept">
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="exampleInputEmail1">Patron Institute</label>
                      <input type="text" class="form-control" name="patron_inst">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Issue Date <span class="text-danger">*</span> </label>
                      <input type="date" class="form-control" name="issue_date">
                    </div>
                    <div class="form-group col-lg-6">
    	        		    <label for="exampleInputPassword1">Status</label>
    		              <select class="form-control" name="status">
    		                <option value="1">Yes</option>
    		                <option value="0">No</option>
    		              </select>
    		             <small id="emailHelp" class="form-text text-muted">If yes it will be show on frontend</small>
  		        	    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label for="exampleInputPassword1">Chief Patron Message</label>
                      <textarea class="form-control textarea" id="summernote" name="chiefpatron_message"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12">
                      <label for="exampleInputPassword1">Editor's Note</label>
                      <textarea class="form-control textarea" id="summer" name="editor_note"></textarea>
                    </div>
                  </div>
                <div class="row">
		        	<div class="form-group col-lg-6">
	            		<label for="exampleInputEmail1">Publication Image<span class="text-danger">*</span></label><br>
	                    <input type="file" name="publication_image" required="" accept="image/*" class="dropify">
	                    <small id="emailHelp" class="form-text text-muted">This is your publication image</small>
	            	</div>
		        	<div class="form-group col-lg-6">
	            		<label for="exampleInputEmail1">Publication File<span class="text-danger">*</span></label><br>
	                    <input type="file" name="publication_file" required="" class="dropify">
                      <small id="emailHelp" class="form-text text-muted">This is your publication file</small>
	            	</div>
	            </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </div>
            <!-- /.card -->
         </div>
         <button type="submit" class="btn btn-info ml-2 mb-3 col-lg-12">Submit</button>
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
