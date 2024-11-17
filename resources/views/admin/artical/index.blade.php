@extends('layouts.admin')
@section('admin_content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Artical</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a href="{{ route('artical.create') }}" class="btn btn-primary"> + Add New</a>
          </ol>
        </div><!-- /.col --><!-- /.col -->
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
            <h3 class="card-title">All Artical ('you can just input new file but not edit')</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped table-sm ytable">
              <thead>
              <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Artical</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              	             
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- datatable script -->
<script type="text/javascript">
    $(function artical(){
    	 table=$('.ytable').DataTable({
    		processing:true,
    		serverSide:true,
    		ajax:"{{route('artical.index')}}",
    		columns:[
    			{data:'DT_RowIndex',name:'DT_RowIndex'},
          {data:'title',name:'title'},
    			{data:'file',name:'file'},
          {data:'date',name:'date'},
    			{data:'status',name:'status'},

    			{data:'action',name:'action',orderable:true,searchable:true},
    		]
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

</script>

@endsection
