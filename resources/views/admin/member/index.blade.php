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
          <h1 class="m-0">Members</h1>
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
            <h3 class="card-title">All Members</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped table-sm ytable">
              <thead>
              <tr>
                <th>SL</th>
                <th>Thumbnail</th>
                <th>Name</th>
                <th>Title</th>
                <th>Steering</th>
                <th>Syndicate</th>
                <th>Finance</th>
                <th>Seneate</th>
                <th>Academic</th>
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
      <h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('member.store') }}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="m_thumbnial">Thumbnail</label>
              <input type="file" class="dropify" data-height="140" id="input-file-now" name="m_thumbnial">
            <small id="emailHelp" class="form-text text-muted">This is your Member Thumbnail</small>
          </div>
           
          <div class="form-group">
            <label for="m_name">Member Name</label>
            <input type="text" class="form-control" id="m_name" name="m_name" required>
          </div>
          <div class="form-group">
            <label for="m_title">Title</label>
            <input type="text" class="form-control" id="m_title" name="m_title">
          </div>
          <div class="form-group">
            <label for="m_designation">Member Designation</label>
            <input type="text" class="form-control" id="m_designation" name="m_designation" required>
          </div>
          <div class="form-group">
            <label for="steering_committee">Steering Committee</label>
            <select class="form-control" name="steering_committee">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="finance_committee">Finance Committee</label>
            <select class="form-control" name="finance_committee">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="syndicate_committee">Syndicate Committee</label>
            <select class="form-control" name="syndicate_committee">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="seneate_committee">Seneate Committee</label>
            <select class="form-control" name="seneate_committee">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="academic_councile">Academin Councile</label>
            <select class="form-control" name="academic_councile">
                <option value="1">Yes</option>
                <option value="0">No</option>
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
      <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
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
    $(function member(){
    	 table=$('.ytable').DataTable({
    		processing:true,
    		serverSide:true,
    		ajax:"{{route('member.index')}}",
    		columns:[
    			{data:'DT_RowIndex',name:'DT_RowIndex'},
    			{data:'m_thumbnial',name:'m_thumbnial',render:function(data,type,full,meta){
		            return "<img src=\""+data+"\" height=\"30\" />";
		        }},
    			{data:'m_name',name:'m_name'},
    			{data:'m_title',name:'m_title'},
    			{data:'steering_committee',name:'steering_committee'},
    			{data:'syndicate_committee',name:'syndicate_committee'},
    			{data:'finance_committee',name:'finance_committee'},
    			{data:'seneate_committee',name:'seneate_committee'},
    			{data:'academic_councile',name:'academic_councile'},
    			{data:'status',name:'status'},
    			{data:'action',name:'action',orderable:true,searchable:true},
    		]
    	});
    });

//member edit
    $('body').on('click','.edit', function(){
        let id=$(this).data('id');
        $.get("member/edit/"+id,function(data){
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
