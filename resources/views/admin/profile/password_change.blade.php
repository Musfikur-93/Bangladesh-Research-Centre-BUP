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
              <li class="breadcrumb-item active">Change Password</li>
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
        	<div class="col-6">
        		<div class="card card-primary">
				<div class="card-header">
				<h3 class="card-title">Change Your Password</h3>
				</div>
				<form action="{{route('admin.password.update')}}" method="post">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputPassword1">Old Password</label>
							<input type="password" class="form-control" name="old_password" id="exampleInputPassword1" placeholder="Old Password">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword2">New Password</label>
							<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword2" placeholder="New Password">
							
							@error('password')
				            <span class="invalid-feedback" role="alert">
				                <strong>{{ $message }}</strong>
				            </span>
				        	@enderror
						</div>

						<div class="form-group">
							<label for="exampleInputPassword3">Retype Password</label>
							<input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword3" placeholder="Retype Password">
						</div>
					</div>
				<div class="card-footer">
				<button type="submit" class="btn btn-primary">Update Password</button>
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
