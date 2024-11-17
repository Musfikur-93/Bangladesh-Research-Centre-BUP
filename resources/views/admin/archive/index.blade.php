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
          <h1 class="m-0">Archive</h1>
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
            <h3 class="card-title">All Archive</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped table-sm ytable">
              <thead>
              <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Date</th>
                <th>Month</th>
                <th>Year</th>
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
      <h5 class="modal-title" id="exampleModalLabel">Add New Archive</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('archive.store') }}" method="post" id="add-form">
      @csrf
      <div class="modal-body"> 
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="eadvisor_id">Publication <span class="text-danger">*</span> </label>
            <select class="form-control" name="publication_id">
              <option>Select Publication</option>
              @foreach($pub as $row)
                <option value="{{$row->id}}">{{$row->publication_name}}</option>
              @endforeach
            </select>
          </div>
           <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
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
      <h5 class="modal-title" id="exampleModalLabel">Edit Archive</h5>
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
    $(function archive(){
    	 table=$('.ytable').DataTable({
    		processing:true,
    		serverSide:true,
    		ajax:"{{route('archive.index')}}",
    		columns:[
    			{data:'DT_RowIndex',name:'DT_RowIndex'},
    			{data:'title',name:'title'},
    			{data:'date',name:'date'},
          {data:'month',name:'month'},
          {data:'year',name:'year'},
    			{data:'action',name:'action',orderable:true,searchable:true},
    		]
    	});
    });

//archive edit
    $('body').on('click','.edit', function(){
        let id=$(this).data('id');
        $.get("archive/edit/"+id,function(data){
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
