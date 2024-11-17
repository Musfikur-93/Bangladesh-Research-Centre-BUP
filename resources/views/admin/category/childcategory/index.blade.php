@extends('layouts.admin')

@section('admin_content')
<!-- dropify css link for file uploaded design -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Childcategory</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal"> + Add New</button>
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
            <h3 class="card-title">All Child Categories Name Here</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-sm">
              <thead>
              <tr>
                <th>SL</th>
                <th>Childcategory Name</th>
                <th>Category Name</th>
                <th>Subcategory Name</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($data as $key=>$row)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$row->childcategory_name}}</td>
                <td>{{$row->category->category_name}}</td>
                <td>{{$row->subcategory->subcategory_name}}</td>
                <td>
                    <a href="#" class="btn btn-info btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('childcategory.delete', $row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
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

<!-- Category insert Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add New Childcategory</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('childcategory.store') }}" method="post">
      @csrf
      <div class="modal-body">
      	  <div class="form-group">
            <label for="category_name">Category/Subcategory</label>
            <select class="form-control" name="subcategory_id" required>
            	@foreach($category as $row)
            		@php
            			$subcategory=DB::table('subcategories')->where('category_id',$row->id)->get();
            		@endphp
            		<option disabled style="color:blue;">{{$row->category_name}}</option>
            		@foreach($subcategory as $row)
            			<option value="{{$row->id}}">---{{$row->subcategory_name}}</option>
            		@endforeach
            	@endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="category_name">Childcategory Name</label>
            <input type="text" class="form-control" name="childcategory_name" required>
            <small id="emailHelp" class="form-text text-muted">This is your child category</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
</div>

<!-- Category edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Childcategory</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id="modal_body">


    </div>
  </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


<!-- Edit modal script -->
<script type="text/javascript">
		$('body').on('click','.edit', function(){
	      let childcat_id=$(this).data('id');
	      $.get("childcategory/edit/"+childcat_id,function(data){
	          $('#modal_body').html(data);
	      });
	    });
    
</script>

@endsection
