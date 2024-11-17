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
          <h1 class="m-0">Event</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"> + Add New</button>
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
            <h3 class="card-title">All Event</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped table-sm ytable">
              <thead>
              <tr>
                <th>SL</th>
                <th>Thumbnail</th>
                <th>Event</th>
                <th>Venue</th>
                <th>Time</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              	             
              </tbody>
            </table>
            <form id="deleted_form" action="" method="delete">
              @csrf @method('DELETE')
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<!-- Slider insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{route('eventnews.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="e_thumbnail">Event Thumbnail</label>
              <input type="file" class="dropify" data-height="140" id="input-file-now" name="e_thumbnail">
            <small id="emailHelp" class="form-text text-muted">This is your Event Thumbnail</small>
          </div>
          <div class="form-group">
            <label for="keynote_img">Keynote Speaker Image</label>
              <input type="file" class="dropify" data-height="140" id="input-file-now" name="keynote_img">
            <small id="emailHelp" class="form-text text-muted">This is your Keynote Speaker Image</small>
          </div>
          <div class="form-group">
            <label for="chief_img">Chief Guest Image</label>
              <input type="file" class="dropify" data-height="140" id="input-file-now" name="chief_img">
            <small id="emailHelp" class="form-text text-muted">This is your Chief Guest Image</small>
          </div>
          <div class="row">
              <div class="form-group col-lg-4">
                <label for="e_title">Title</label>
                <input type="text" class="form-control" id="e_title" name="e_title" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="e_venue">Venue</label>
                <input type="text" class="form-control" id="e_venue" name="e_venue" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="e_time">Time</label>
                <input type="text" class="form-control" id="e_time" name="e_time">
              </div>
          </div>
          
          <div class="form-group">
            <label for="e_des">Description</label>
            	<textarea class="form-control" name="e_des" id="summernote"></textarea>
          </div>
          <div class="row">
              <div class="form-group col-lg-4">
                <label for="keynote_name">Keynote Name</label>
                <input type="text" class="form-control" name="keynote_name" required>
              </div>
              <div class="form-group col-lg-4">
                  <label for="keynote_desig">Designation</label>
                  <input type="text" class="form-control" name="keynote_desig" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="keynote_organization">Organization</label>
                <input type="text" class="form-control" name="keynote_organization" required>
              </div>
          </div>
          <div class="row">
              <div class="form-group col-lg-4">
                <label for="chief_name">Chief Name</label>
                <input type="text" class="form-control" name="chief_name" required>
              </div>
              <div class="form-group col-lg-4">
                  <label for="chief_desig">Designation</label>
                  <input type="text" class="form-control" name="chief_desig" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="chief_organization">Organization</label>
                <input type="text" class="form-control" name="chief_organization" required>
              </div>
          </div>
          <div class="row">
              <div class="form-group col-lg-4">
                <label for="keynote_type">Keynote Type</label>
                <input type="text" class="form-control" name="keynote_type" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="chief_type">Chief Type</label>
                <input type="text" class="form-control" name="chief_type" required>
              </div>
              <div class="form-group col-lg-4">
                <label for="date">Date</label>
                <input type="text" class="form-control" name="date" required>
              </div>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">If yes it will be show on frontend</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><span class="d-none">loading...</span>Submit</button>
      </div>
    </form>
  </div>
</div>
</div>

<!-- Notice edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Speaker</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id="modal_body">


    </div>
  </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<!-- datatable script -->
<script type="text/javascript">
    $(function event(){
    	 table=$('.ytable').DataTable({
    		processing:true,
    		serverSide:true,
    		ajax:"{{route('event.index')}}",
    		columns:[
    			{data:'DT_RowIndex',name:'DT_RowIndex'},
    			{data:'e_thumbnail',name:'e_thumbnail',render:function(data,type,full,meta){
		            return "<img src=\""+data+"\" height=\"30\" />";
		        }},
    			{data:'e_title',name:'e_title'},
    			{data:'e_venue',name:'e_venue'},
    			{data:'e_time',name:'e_time'},
    			{data:'date',name:'date'},
    			{data:'status',name:'status'},
    			{data:'action',name:'action',orderable:true,searchable:true},
    		]
    	});
    });

//event edit
    $('body').on('click','.edit', function(){
        let id=$(this).data('id');
        $.get("event/edit/"+id,function(data){
            $('#modal_body').html(data);
        });
      });

$('.dropify').dropify({
      message: {
        'default': 'Click Here',
        'replace': 'Drag and Drop to replace',
        'remove': 'Remove',
        'error': 'Opps, something wrong'
      }
    });

 $(document).ready(function(){
  //delete script
  $(document).on('click','#delete',function(e){
    e.preventDefault();
    var url = $(this).attr('href');
      $('#deleted_form').attr('action',url);
      swal({
          title: "Are you want to delete?",
          text: "Once Delete, This will be Permanently Delete!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
    })
    .then((willDelete)=>{
      if(willDelete){
        $('#deleted_form').submit();
      }else{
        swal("Your imaginary file is safe!");
      }
      });
   });

   //data passed through here for delete
    $('#deleted_form').submit(function(e){
      e.preventDefault();
      var url = $(this).attr('action');
      var request = $(this).serialize();
      $.ajax({
        url:url,
        type:'post',
        async:false,
        data:request,
        success:function(data){
          toastr.success(data);
          $('#deleted_form')[0].reset();
            table.ajax.reload();
        }
      });
    });
});

</script>

@endsection
