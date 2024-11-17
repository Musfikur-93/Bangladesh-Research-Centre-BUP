@extends('layouts.app')
@section('content')
<!-- Mirrored from htmldemo.net/eduhome/eduhome/teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 05:39:45 GMT -->
  <!-- Main Stylesheet -->
  <link href="{{asset('public/frontend/file')}}/css/style.css" rel="stylesheet">
   <body>
   	<!-- Banner Area Start -->
    <div class="banner-area-wrapper">
        <div class="banner-area text-center notice_two-area">   
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner-content-wrapper">
                            <div class="banner-content">
                                <h2>notice</h2> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- Banner Area End -->
  	<!-- notice -->
	<section class="section">
	  <div class="container">
	    <div class="row">
	      <div class="col-12">
	        <ul class="list-unstyled">
	          <!-- notice item -->
	          @foreach($allnotice as $row)
	          <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
	            <div class="d-md-table-cell text-center p-4 bg-success text-white mb-4 mb-md-0"><span class="h2 d-block"><i class="fa fa-book"></i></span> {{ date('d, F Y', strtotime($row->date))}}</div>
	            <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
	              <a class="h4 mb-3 d-block ">{{substr($row->title,0,200)}}...</a>
	              <p class="mb-0">{{substr($row->description,0,150)}}...</p>
	            </div>
	            <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="{{asset('public/files/notice/'.$row->notice_file)}}" class="btn btn-success" target="_blank"><i class="fa fa-eye"></i> view</a></div>
	          </li>
	          @endforeach
	        </ul>
	      </div>
	      <!-- Pagination Start -->
             <div class="shop_page_nav d-flex flex-row pb-10">
                <ul class="page_nav d-flex flex-row"> 
                    {{ $allnotice->links() }}
                </ul> 
            </div>
            <!-- Pagination Start -->
	    </div>
	  </div>
	</section>
	<!-- /notice -->
  </body>
</html>

@endsection


