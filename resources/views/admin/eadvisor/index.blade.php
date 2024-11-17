@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Editorial Advisor</h1>
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
            <h3 class="card-title">All Advisor Here</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped table-sm ytable">
              <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Institute</th>
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
      <h5 class="modal-title" id="exampleModalLabel">Add New Advisor</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{route('advisor.store')}}" method="post" id="add-form">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label for="eadvisor_name">Name</label>
            <input type="text" class="form-control" name="eadvisor_name" required>
          </div>
          <div class="form-group">
            <label for="eadvisor_desig">Designation</label>
            <input type="text" class="form-control" name="eadvisor_desig" required>
          </div>
          <div class="form-group">
            <label for="eadvisor_dept">Department</label>
            <input type="text" class="form-control" name="eadvisor_dept">
          </div>
          <div class="form-group">
            <label for="eadvisor_inst">Institute</label>
            <input type="text" class="form-control" name="eadvisor_inst">
          </div>
          <div class="form-group">
            <label for="publication_id">Publication</label>
            <select class="form-control" name="publication_id">
              <option>Select Publication Name</option>
              @foreach($pub as $row)
                <option value="{{$row->id}}">{{$row->publication_name}}</option>
              @endforeach
            </select>
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
      <h5 class="modal-title" id="exampleModalLabel">Edit Advisor</h5>
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

<!-- datatable script -->
<script type="text/javascript">
    $(function advisor(){
    	 table=$('.ytable').DataTable({
    		processing:true,
    		serverSide:true,
    		ajax:"{{route('advisor.index')}}",
    		columns:[
    			{data:'DT_RowIndex',name:'DT_RowIndex'},
    			{data:'eadvisor_name',name:'eadvisor_name'},
    			{data:'eadvisor_desig',name:'eadvisor_desig'},
    			{data:'eadvisor_dept',name:'eadvisor_dept'},
    			{data:'eadvisor_inst',name:'eadvisor_inst'},
    			{data:'status',name:'status'},
    			{data:'action',name:'action',orderable:true,searchable:true},
    		]
    	});
    });

//notice edit
$('body').on('click','.edit', function(){
    let id=$(this).data('id');
    $.get("advisor/edit/"+id,function(data){
        $('#modal_body').html(data);
    });
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
