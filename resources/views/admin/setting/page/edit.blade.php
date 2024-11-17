@extends('layouts.admin')

@section('admin_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">Update Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        	<div class="col-12">
        		<div class="card card-primary">
				<div class="card-header">
				<h3 class="card-title">Update a Page</h3>
				</div>
				<form action="{{route('update.page',$data->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label for="page position">Page Position</label>
							<select class="form-control" name="page_position">
								<option value="1" @if($data->page_position==1) selected @endif>Line One</option>
								<option value="2" @if($data->page_position==2) selected @endif>Line Two</option>
							</select>
						</div>
						<div class="form-group">
							<label for="page name">Page Name</label>
							<input type="text" class="form-control" name="page_name" value="{{$data->page_name}}">
						</div>
						<div class="form-group">
							<label for="page name">Page Title</label>
							<input type="text" class="form-control" name="page_title" value="{{$data->page_title}}">
						</div>
						<div class="form-group">
							<label for="page name">Page Description</label>
							<textarea class="form-control" id="summernote" name="page_description">{{$data->page_description}}</textarea>
							<small>This data show on your webpage</small>
						</div>
						<div class="form-group">
							<label for="page thumbnail">Page Thumbnail</label>
							<input type="file" class="form-control" name="page_thumbnail">
							<input type="hidden" name="old_thumbnail" value="{{$data->page_thumbnail}}">
						</div>
					</div>
				<div class="card-footer">
				<button type="submit" class="btn btn-primary">Update</button>
				</div>
				</form>
				</div>
	        </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
