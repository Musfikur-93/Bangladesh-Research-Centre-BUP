@extends('layouts.app')
@section('content')
<!-- Mirrored from htmldemo.net/eduhome/eduhome/teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 05:39:45 GMT -->
  <!-- Main Stylesheet -->
  <link href="{{asset('public/frontend/file')}}/css/style.css" rel="stylesheet">
   <body>
   	<!-- Banner Area Start -->
    <div class="banner-area-wrapper">
        <div class="banner-area text-center artical-area">   
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner-content-wrapper">
                            <div class="banner-content">
                                <h2>articals</h2> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- Banner Area End -->
  	<!-- artical -->
	<section class="section">
	  <div class="container">
	    <div class="row">
	      <div class="col-12">
	        <ul class="list-unstyled">
	          <!-- artical item -->
	          @foreach($artical as $key=>$row)
	          <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
	            <!-- <div class="d-md-table-cell p-4 bg-primary mb-4 mb-md-0">
	            	<h4 class="h4 mb-3 d-block text-white text-center">{{ date('d, F Y', strtotime($row->issue_date))}}</h3>
	            </div> -->
	            <div class="d-md-table-cell text-center p-4 bg-success text-white mb-4 mb-md-0"><span class="h2 d-block">{{$key+1}}</span> {{ date('d, F Y', strtotime($row->issue_date))}}</div>
	            <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
	              <a class="h4 mb-3 d-block">{{substr($row->title,0,70)}}...</a>
	              <p class="mb-0">{{$row->author_name}}</p>
	            </div>
	            <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="{{asset('public/files/artical/'.$row->file)}}" class="btn btn-success" target="_blank"><i class="fa fa-download"></i> download</a></div>
	          </li>
	          @endforeach
	        </ul>
	      </div>
	      <!-- Pagination Start -->
             <div class="shop_page_nav d-flex flex-row pb-10">
                <ul class="page_nav d-flex flex-row"> 
                    {{ $artical->links() }}
                </ul> 
            </div>
            <!-- Pagination Start -->
	    </div>
	  </div>
	</section>
	<!-- /artical -->
  </body>
</html>

@endsection


