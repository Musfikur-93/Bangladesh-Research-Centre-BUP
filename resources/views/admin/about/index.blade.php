@extends('layouts.admin')

@section('admin_content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">About</h1>
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
            <h3 class="card-title">All About Here</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped table-sm ytable">
              <thead>
              <tr>
                <th>SL</th>
                <th>About Thumbnail</th>
                <th>Title</th>
                <th>Vision</th>
                <th>Mission</th>
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

<!-- About insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add New About</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('about.store') }}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
      	 <div class="form-group">
            <label for="about_thumbnail">About Thumbnail</label>
              <input type="file" name="about_thumbnail" class="form-control">
            <small id="emailHelp" class="form-text text-muted">This is your about thubmnail </small>
          </div>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="summernote"></textarea>
          </div>
          <div class="form-group">
            <label for="vision">Vision</label>
            <input type="text" class="form-control" id="vision" name="vision" required>
          </div>
          <div class="form-group">
            <label for="vision_details">Vision Details</label>
            <textarea class="form-control" name="vision_details"></textarea>
          </div>
          <div class="form-group">
            <label for="mission">Mission</label>
            <input type="text" class="form-control" id="mission" name="mission" required>
          </div>
          <div class="form-group">
            <label for="mission_details">Mission Details</label>
            <textarea class="form-control" name="mission_details"></textarea>
          </div>
       </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><span class="loading d-none">loading...</span>Submit</button>
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
      <h5 class="modal-title" id="exampleModalLabel">Edit About</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id="modal_body">


    </div>
  </div>
</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- datatable script -->
<script type="text/javascript">
    $(function about(){
    	 table=$('.ytable').DataTable({
    		processing:true,
    		serverSide:true,
    		ajax:"{{route('about.index')}}",
    		columns:[
    			{data:'DT_RowIndex',name:'DT_RowIndex'},
    			{data:'about_thumbnail',name:'about_thumbnail',render:function(data,type,full,meta){
		            return "<img src=\""+data+"\" height=\"30\" />";
		      }},
    			{data:'title',name:'title'},
    			{data:'vision',name:'vision'},
    			{data:'mission',name:'mission'},
    			{data:'action',name:'action',orderable:true,searchable:true},
    		]
    	});
    });

//about edit
  $('body').on('click','.edit', function(){
      let about_id=$(this).data('id');
      $.get("about/edit/"+about_id,function(data){
          $('#modal_body').html(data);
      });
    });

 $(document).ready(function(){
  //delete script
  $(document).on('click','#about_delete',function(e){
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
