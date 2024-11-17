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
          <h1 class="m-0">Administration</h1>
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
            <h3 class="card-title">All Administration</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped table-sm ytable">
              <thead>
              <tr>
                <th>SL</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Office</th>
                <th>Phone</th>
                <th>Joining</th>
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
      <h5 class="modal-title" id="exampleModalLabel">Add Administration</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('ad.store') }}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="photo">Photo</label>
              <input type="file" class="dropify" data-height="140" id="input-file-now" name="photo">
            <small id="emailHelp" class="form-text text-muted">This is your Photo</small>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" name="designation" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" name="phone">
          </div>
          <div class="form-group">
            <label for="office">Office</label>
            <input type="text" class="form-control" name="office" required>
          </div>
          <div class="form-group">
            <label for="degree">Degree</label>
            <input type="text" class="form-control" name="degree">
          </div>
          <div class="form-group">
            <label for="experience">Experience</label>
            <input type="text" class="form-control" name="experience">
          </div>
          <div class="form-group">
            <label for="contact">Contact Information</label>
            <input type="text" class="form-control" name="contact">
          </div>
          <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" class="form-control" name="facebook">
          </div>
          <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="text" class="form-control" name="twitter">
          </div>
          <div class="form-group">
            <label for="linkedin">Linkedin</label>
            <input type="text" class="form-control" name="linkedin">
          </div>
          <div class="form-group">
            <label for="youtube">Youtube</label>
            <input type="text" class="form-control" name="youtube">
          </div>
          <div class="form-group">
            <label for="joining_date">Joining Date</label>
            <input type="text" class="form-control" name="joining_date" required>
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
      <h5 class="modal-title" id="exampleModalLabel">Edit Administration</h5>
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
    $(function administration(){
    	 table=$('.ytable').DataTable({
    		processing:true,
    		serverSide:true,
    		ajax:"{{route('ad.index')}}",
    		columns:[
    			{data:'DT_RowIndex',name:'DT_RowIndex'},
    			{data:'photo',name:'photo',render:function(data,type,full,meta){
		            return "<img src=\""+data+"\" height=\"30\" />";
		        }},
    			{data:'name',name:'name'},
    			{data:'office',name:'office'},
    			{data:'phone',name:'phone'},
    			{data:'joining_date',name:'joining_date'},
    			{data:'status',name:'status'},
    			{data:'action',name:'action',orderable:true,searchable:true},
    		]
    	});
    });

//administration edit
    $('body').on('click','.edit', function(){
        let id=$(this).data('id');
        $.get("administration/edit/"+id,function(data){
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
