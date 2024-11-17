@extends('layouts.app')
@section('content')
<div class="banner-area-wrapper">
    <div class="banner-area text-center member-area">   
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content-wrapper">
                        <div class="banner-content">
                            <h2>Committee's</h2> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<!-- Banner Area End -->
<!-- Tabs content -->
	<div class="tab-content mt-50" id="ex1-content">
	  <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
	    <table class="table table-bordered">
	    	<p class="text-center" style="font-size: 20px; font-weight: 800; text-transform: uppercase ;">Steering Committee</p>
	    	<thead>
		    <tr>
		      <th style="font-weight: 800;" scope="col">Photo</th>
		      <th style="font-weight: 800;" scope="col">Name</th>
		      <th style="font-weight: 800;" scope="col">Designation</th>
		    </tr>
		  </thead>
	    <tbody>
    		@foreach($steering as $key=>$row)
		    <tr>
		      <td><img src="{{asset($row->m_thumbnial)}}" style="height:70px; width:70px; alt="{{$row->m_name}}"></td>    
		      <td>{{$row->m_name}}</td>
		      <td>{{$row->m_designation}}</td>
		    </tr>
	    	@endforeach
	  </tbody>
	</table>
	  </div>
	</div>
	<!-- Tabs content -->

	<!-- Tabs content -->
	<div class="tab-content mt-10" id="ex1-content">
	  <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
	    <table class="table table-bordered">
	        <!--
	    	<p class="text-center" style="font-size: 20px; font-weight: 800; text-transform: uppercase ;">Other's Committee</p>
	    	<thead>
		    <tr>
		      <th style="font-weight: 800;" scope="col">Member</th>
		      <th style="font-weight: 800;" scope="col">Name</th>
		      <th style="font-weight: 800;" scope="col">Designation</th>
		    </tr>
		  </thead>
		  -->
	    <tbody>
    		@foreach($finance as $key=>$row)
		    <tr>
		      <td><img src="{{asset($row->m_thumbnial)}}" style="height:70px; width:70px; alt="{{$row->m_name}}"></td>
		      <td>{{$row->m_name}}</td>
		      <td>{{$row->m_designation}}</td>
		    </tr>
	    	@endforeach
	  </tbody>
	</table>
	  </div>
	</div>
	<!-- Tabs content -->

	<!-- Tabs content -->
	<div class="tab-content mt-10" id="ex1-content">
	  <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
	    <table class="table table-bordered">
	    <!--	
	    <p class="text-center" style="font-size: 20px; font-weight: 800; text-transform: uppercase ;">Other's Committee</p>
	    	<thead>
		    <tr>
		      <th style="font-weight: 800;" scope="col">Member</th>
		      <th style="font-weight: 800;" scope="col">Name</th>
		      <th style="font-weight: 800;" scope="col">Designation</th>
		    </tr>
		  </thead>
		  -->
	    <tbody>
    		@foreach($syndicate as $key=>$row)
		    <tr>
		      <td><img src="{{asset($row->m_thumbnial)}}" style="height:70px; width:70px; alt="{{$row->m_name}}"></td>
		      <td>{{$row->m_name}}</td>
		      <td>{{$row->m_designation}}</td>
		    </tr>
		    @endforeach
	  </tbody>
	</table>
	  </div>
	</div>
	<!-- Tabs content -->

	<!-- Tabs content -->
	<div class="tab-content mt-10" id="ex1-content">
	  <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
	    <table class="table table-bordered">
	        <!--
	    	<p class="text-center" style="font-size: 20px; font-weight: 800; text-transform: uppercase ;">Other's Committee</p>
	    	<thead>
		    <tr>
		      <th style="font-weight: 800;" scope="col">Member</th>
		      <th style="font-weight: 800;" scope="col">Name</th>
		      <th style="font-weight: 800;" scope="col">Designation</th>
		    </tr>
		  </thead>
		  -->
	    <tbody>
    		@foreach($seneate as $key=>$row)
		    <tr>
		      <td><img src="{{asset($row->m_thumbnial)}}" style="height:70px; width:70px; alt="{{$row->m_name}}"></td>
		      <td>{{$row->m_name}}</td>
		      <td>{{$row->m_designation}}</td>
		    </tr>
		    @endforeach
	  </tbody>
	</table>
	  </div>
	</div>
	<!-- Tabs content -->

	<!-- Tabs content -->
	<div class="tab-content mt-10" id="ex1-content">
	  <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
	    <table class="table table-bordered">
	        <!--
	    	<p class="text-center" style="font-size: 20px; font-weight: 800; text-transform: uppercase ;">Other's Committee</p>
	    	<thead>
		    <tr>
		      <th style="font-weight: 800;" scope="col">Member</th>
		      <th style="font-weight: 800;" scope="col">Name</th>
		      <th style="font-weight: 800;" scope="col">Designation</th>
		    </tr>
		  </thead>
		  -->
	    <tbody>
    		@foreach($academic as $key=>$row)
		    <tr>
		      <td><img src="{{asset($row->m_thumbnial)}}" style="height:70px; width:70px; alt="{{$row->m_name}}"></td>
		      <td>{{$row->m_name}}</td>
		      <td>{{$row->m_designation}}</td>
		    </tr>
		    @endforeach
	  </tbody>
	</table>
	   <!-- Pagination Start -->
	     <div class="shop_page_nav d-flex flex-row pb-10">
	        <ul class="page_nav d-flex flex-row"> 
	            {{ $academic->links() }}
	        </ul> 
	    </div>
	    <!-- Pagination Start -->
	  </div>
	</div>
	<!-- Tabs content -->

@endsection