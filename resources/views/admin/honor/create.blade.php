@extends('layouts.admin')
@section('admin_content')
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Honor Board</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Honor Member</li>
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
       <form action="{{route('honor.store')}}" method="post" enctype="multipart/form-data">
         @csrf
       	<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Honor Member</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Name <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="hb_name" required="">
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="exampleInputPassword1">Designation <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="hb_designation" required="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label for="exampleInputEmail1">Short Profile <span class="text-danger">*</span> </label>
                      <input type="file" class="form-control" name="hb_profile">
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="exampleInputPassword1">Joining Date</label><br>
                      <input type="text" class="form-control" name="hb_joining">
                    </div>
                  </div>
                    <div class="row">
			        	<div class="form-group col-lg-6">
			        		<label for="exampleInputPassword1">Status</label>
				              <select class="form-control" name="status">
				                <option value="1">Yes</option>
				                <option value="0">No</option>
				              </select>
				             <small id="emailHelp" class="form-text text-muted">If yes it will be show on frontend</small>
			        	</div>
			        	<div class="form-group col-lg-6">
		            		<label for="exampleInputEmail1">Image<span class="text-danger">*</span></label><br>
		                    <input type="file" name="hb_image" required accept="image/*" class="dropify">
		                    <small id="emailHelp" class="form-text text-muted">This is your honor board image</small>
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
