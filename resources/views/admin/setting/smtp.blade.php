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
              <li class="breadcrumb-item active">SMTP Mail</li>
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
				<h3 class="card-title">SMTP Settings</h3>
				</div>
				<form action="{{route('smtp.setting.update',$data->id)}}" method="post">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label for="mailer">Mail Mailer</label>
							<input type="text" class="form-control" name="mailer" value="{{$data->mailer}}" placeholder="Mail Mailer Example:smtp">
						</div>
						<div class="form-group">
							<label for="host">Mail Host</label>
							<input type="text" class="form-control" name="host" value="{{$data->host}}" placeholder="Mail Host">
						</div>
						<div class="form-group">
							<label for="port">Mail Port</label>
							<input type="text" class="form-control" name="port" value="{{$data->port}}" placeholder="Mail Port Example:2525">
						</div>
						<div class="form-group">
							<label for="username">Mail Username</label>
							<input type="text" class="form-control" name="user_name" value="{{$data->user_name}}" placeholder="Mail Username">
						</div>
						<div class="form-group">
							<label for="password">Mail Password</label>
							<input type="text" class="form-control" name="password" value="{{$data->password}}" placeholder="Mail Password">
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
