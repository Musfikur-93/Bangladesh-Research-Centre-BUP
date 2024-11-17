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
              <li class="breadcrumb-item active">Website Setting</li>
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
        	<div class="col-8">
        		<div class="card card-primary">
				<div class="card-header">
				<h3 class="card-title">Settings</h3>
				</div>
				<form action="{{route('website.setting.update',$data->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label for="metatitle1">Phone One</label>
							<input type="text" class="form-control" name="phone_one" value="{{$data->phone_one}}" placeholder="Enter Phone Number" required>
						</div>
						<div class="form-group">
							<label for="metatitle1">Phone Two</label>
							<input type="text" class="form-control" name="phone_two" value="{{$data->phone_two}}" placeholder="Enter Another Phone Number">
						</div>
						<div class="form-group">
							<label for="metatitle1">Main Email</label>
							<input type="email" class="form-control" name="main_email" value="{{$data->main_email}}" placeholder="Enter Email" required>
						</div>
						<div class="form-group">
							<label for="metatitle1">Support Email</label>
							<input type="email" class="form-control" name="support_email" value="{{$data->support_email}}" placeholder="Enter Support Email" required>
						</div>
						<div class="form-group">
							<label for="metatitle1">Fax</label>
							<input type="text" class="form-control" name="fax" value="{{$data->fax}}" placeholder="Fax Number" required>
						</div>
						<div class="form-group">
							<label for="metatitle1">Copyright</label>
							<input type="text" class="form-control" name="copyright" value="{{$data->copyright}}" placeholder="Copyright" required>
						</div>
						<div class="form-group">
							<label for="metatitle1">Address</label>
							<textarea  class="form-control" id="summernote" name="address" required>{{$data->address}}</textarea>
						</div>

						<strong class="text-center text-success">-- Usefull Links --</strong><br>
						<div class="form-group">
							<label for="metatitle1">Link One</label>
							<input type="text" class="form-control" name="link_one" value="{{$data->link_one}}">
						</div>
						<div class="form-group">
							<label for="metatitle1">Link Two</label>
							<input type="text" class="form-control" name="link_two" value="{{$data->link_two}}">
						</div>
						<div class="form-group">
							<label for="metatitle1">Link Three</label>
							<input type="text" class="form-control" name="link_three" value="{{$data->link_three}}">
						</div>
						<div class="form-group">
							<label for="metatitle1">Link Four</label>
							<input type="text" class="form-control" name="link_four" value="{{$data->link_four}}">
						</div>
						<div class="form-group">
							<label for="metatitle1">Link Five</label>
							<input type="text" class="form-control" name="link_five" value="{{$data->link_five}}">
						</div>
						<strong class="text-center text-success">-- Social Links --</strong><br>
						<div class="form-group">
							<label for="metatitle1">Facebook</label>
							<input type="text" class="form-control" name="facebook" value="{{$data->facebook}}">
						</div>
						<div class="form-group">
							<label for="metatitle1">Twitter</label>
							<input type="text" class="form-control" name="twitter" value="{{$data->twitter}}">
						</div>
						<div class="form-group">
							<label for="metatitle1">Linkedin</label>
							<input type="text" class="form-control" name="linkedin" value="{{$data->linkedin}}">
						</div>
						<div class="form-group">
							<label for="metatitle1">Instagram</label>
							<input type="text" class="form-control" name="instagram" value="{{$data->instagram}}">
						</div>
						<div class="form-group">
							<label for="metatitle1">YouTube</label>
							<input type="text" class="form-control" name="youtube" value="{{$data->youtube}}">
						</div>
						<div class="form-group">
							<label for="metatitle1">Video</label>
							<input type="text" class="form-control" name="video_url" value="{{$data->video_url}}">
						</div>
						<strong class="text-center text-success">-- Logo and Favicon --</strong><br>
						<div class="form-group">
							<label for="metatitle1">Main Logo</label>
							<input type="file" class="form-control" name="logo">
							<input type="hidden" name="old_logo" value="{{$data->logo}}">
						</div>
						<div class="form-group">
							<label for="metatitle1">Favicon</label>
							<input type="file" class="form-control" name="favicon">
							<input type="hidden" name="old_favicon" value="{{$data->favicon}}">
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
