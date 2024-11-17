@extends('layouts.admin')
@section('admin_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <button class="btn btn-info" data-toggle="modal" data-target="#userModal">+ Add New</button> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<section class="content">
	  <div class="container-fluid">
	    <div class="row">
	      <div class="col-12">
	        <div class="card">
	          <div class="card-header">
	            <h3 class="card-title">All User list here</h3>
	          </div>
	          <!-- /.card-header -->
	           <div class="card-body">
	           	<table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
	                  @foreach($data as $key=>$row)
	                  <tr>
	                    <td>{{$key+1}}</td>
	                    <td>
                          <img src="{{ asset($row->avatar) }}" style="width: 32px;height: 32px;">
                      </td>
	                    <td>{{$row->name}}</td>
	                    <td>{{$row->designation}}</td>
	                    <td>{{$row->department}}</td>
	                    <td>{{$row->email}}</td>
                      <td>{{$row->phone}}</td>
                      <td>
                        @if($row->category==1)<span class="badge badge-success">category</span>@endif
                        @if($row->slider==1)<span class="badge badge-success">notice</span>@endif
                        @if($row->notice==1)<span class="badge badge-success">notice</span>@endif
                        @if($row->about==1)<span class="badge badge-success">about</span>@endif
                        @if($row->gallery==1)<span class="badge badge-success">gallery</span>@endif
                        @if($row->event==1)<span class="badge badge-success">event</span>@endif
                        @if($row->administration==1)<span class="badge badge-success">administration</span>@endif
                        @if($row->researcher==1)<span class="badge badge-success">researcher</span>@endif
                        @if($row->archive==1)<span class="badge badge-success">archive</span>@endif
                        @if($row->publication==1)<span class="badge badge-success">publication</span>@endif
                        @if($row->author==1)<span class="badge badge-success">author</span>@endif
                        @if($row->newsletter==1)<span class="badge badge-success">newsletter</span>@endif
                        @if($row->setting==1)<span class="badge badge-success">setting</span>@endif
                      </td>
	                    <td>
                      <a href="{{ route('user.edit', $row->id) }}" class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></a>
                      <a href="{{ route('user.delete', $row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                    </td>
	                  </tr>
	                  @endforeach 
                  </tbody>
                </table>
	          </div>
	        </div>
	      </div>
	   </div>
   </div>
</section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection