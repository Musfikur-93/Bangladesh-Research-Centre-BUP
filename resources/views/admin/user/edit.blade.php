@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update role</li>
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
       <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Role</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
               <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Name <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="name" value="{{$data->name}}">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Designation <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="designation" value="{{$data->designation}}">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Email <span class="text-danger">*</span> </label>
                      <input type="email" class="form-control" value="{{$data->email}}" name="email">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Department <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="department" value="{{$data->department}}">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputEmail1">Phone <span class="text-danger">*</span> </label>
                      <input type="text" class="form-control" name="phone" value="{{$data->phone}}">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="exampleInputPassword1">Avatar <span class="text-danger">*</span> </label>
                      <input type="file" class="form-control" name="avatar">
                      <input type="hidden" class="form-control" name="old_avatar" value="{{$data->avatar}}">
                      <img src="{{asset($data->avatar)}}" style="height: 50px; width: 50px;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                        <h6>Category</h6>
                       <input type="checkbox" name="category" value="1" @if($data->category==1) checked @endif>
                    </div>
                    <div class="col-3">
                        <h6>Slider</h6>
                       <input type="checkbox" name="slider" value="1" @if($data->slider==1) checked @endif>
                    </div>
                    <div class="col-3">
                        <h6>Notice</h6>
                       <input type="checkbox" name="notice" value="1" @if($data->notice==1) checked @endif>
                    </div>
                    <div class="col-3">
                        <h6>About</h6>
                       <input type="checkbox" name="about" value="1" @if($data->about==1) checked @endif>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                        <h6>Gallery</h6>
                       <input type="checkbox" name="gallery" value="1" @if($data->gallery==1) checked @endif>
                    </div>
                    <div class="col-3">
                        <h6>Event</h6>
                       <input type="checkbox" name="event" value="1" @if($data->event==1) checked @endif>
                    </div>
                    <div class="col-3">
                        <h6>Administration</h6>
                       <input type="checkbox" name="administration" value="1" @if($data->administration==1) checked @endif>
                    </div>
                    <div class="col-3">
                        <h6>Researcher</h6>
                       <input type="checkbox" name="researcher" value="1" @if($data->researcher==1) checked @endif>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                        <h6>Archive</h6>
                       <input type="checkbox" name="archive" value="1" @if($data->archive==1) checked @endif>
                    </div>
                    <div class="col-3">
                        <h6>Publication</h6>
                       <input type="checkbox" name="publication" value="1" @if($data->publication==1) checked @endif>
                    </div>
                    <div class="col-3">
                        <h6>Author</h6>
                       <input type="checkbox" name="author" value="1" @if($data->author==1) checked @endif>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                        <h6>Newsletter</h6>
                       <input type="checkbox" name="newsletter" value="1" @if($data->newsletter==1) checked @endif>
                    </div>
                    <div class="col-3">
                        <h6>Setting</h6>
                       <input type="checkbox" name="setting" value="1" @if($data->setting==1) checked @endif>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <button class="btn btn-info ml-2" type="submit">Update</button>
           </div>
            <!-- /.card --> 
         </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
