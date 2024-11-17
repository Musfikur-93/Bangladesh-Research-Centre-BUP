@extends('layouts.admin')
@section('admin_content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Photo</h1>
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
            <h3 class="card-title">All Photo Here</h3>
          </div>
          <div class="row p-2">
            <div class="form-group col-4">
              <label>Status</label>
              <select class="form-control submitable" name="status" id="status">
                <option value="1">Active</option>
                <option value="0">Deactive</option>
              </select>
            </div>

            <div class="form-group col-3">
                <label>Date</label>
                <input type="date" name="date" id="date" class="form-control submitable_input">
            </div>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped table-sm ytable">
              <thead>
              <tr>
                <th>SL</th>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Description</th>
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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Photo insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add New Photo</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{ route('photo.store') }}" method="post" id="add-form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="file" class="form-control dropify" name="thumbnail" required>
          </div>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="summernote"></textarea>
          </div>
          <div class="form-group col-lg-12">  
            <table class="table table-bordered" id="dynamic_field">
            <div class="card-header">
              <h3 class="card-title">More Images (Click Add For More Image)</h3>
            </div> 
              <tr>  
                  <td><input type="file" name="images[]" class="form-control name_list" /></td>  
                  <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>  
              </tr>  
            </table>    
          </div>
          
          <div class="card p-4">
            <h6>Status</h6>
            <input type="checkbox" name="status" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
         </div>

       </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><span class="loading d-none">loading...</span>Submit</button>
      </div>
    </form>
  </div>
</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('public/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<!-- datatable script -->
<script type="text/javascript">
    $(function photo(){
       table=$('.ytable').DataTable({
          processing: true,
          serverSide: true,
          searching: true,
        ajax:{
            url: "{{ route('photo.index') }}", 
            data:function(e) {
              e.status =$("#status").val();
              e.date =$("#date").val();
            }
          },
        columns:[
          {data:'DT_RowIndex',name:'DT_RowIndex'},
          {data:'thumbnail',name:'thumbnail',render:function(data,type,full,meta){
            return "<img src=\""+data+"\" height=\"30\" />";
          }},
          {data:'title',name:'title'},
          {data:'description',name:'description'},
          {data:'date',name:'date'},
          {data:'status',name:'status'},
          {data:'action',name:'action',orderable:true,searchable:true},
        ]
      });
    });

  $('.dropify').dropify();  //dropify image
    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
      $(document).ready(function(){      
         var postURL = "<?php echo url('addmore'); ?>";
         var i=1;  
         $('#add').click(function(){  
              i++;  
              $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" accept="image/*" name="images[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
         });  
         $(document).on('click', '.btn_remove', function(){  
              var button_id = $(this).attr("id");   
              $('#row'+button_id+'').remove();  
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

//status deactive 
  $('body').on('click','.active_status', function(){
      let id=$(this).data('id');
      var url="{{ url('photo/active') }}/"+id;
      $.ajax({
        url:url,
        type:'get',
        success:function(data){
          toastr.success(data);
          table.ajax.reload();
        }
      });
    });

//status deactive 
  $('body').on('click','.deactive_status', function(){
      let id=$(this).data('id');
      var url="{{ url('photo/deactive') }}/"+id;
      $.ajax({
        url:url,
        type:'get',
        success:function(data){
          toastr.success(data);
          table.ajax.reload();
        }
      });
    });

  //submitable class call for every change
  $(document).on('change','.submitable', function(){
    $('.ytable').DataTable().ajax.reload();
  });

  $(document).on('blur','.submitable_input', function(){
    $('.ytable').DataTable().ajax.reload();
  });

</script>

@endsection
