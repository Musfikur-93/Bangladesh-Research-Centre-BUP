@extends('layouts.app')
@section('content')
    
<!-- Banner Area Start -->
		<div class="banner-area-wrapper">
            <div class="banner-area text-center honor-area">	
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner-content-wrapper">
                                <div class="banner-content">
                                    <h2>honor member's</h2> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
		<!-- Banner Area End -->
        <!-- Teacher Start -->
        <div class="teacher-area pt-150 pb-105">
            <div class="container">
                <div class="row">
                	@foreach($honor as $row)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-teacher mb-45">
                            @if($row->hb_image!==NULL)
                            <div class="single-teacher-img">
                                <a href="#"><img src="{{asset($row->hb_image)}}" alt="{{$row->hb_name}}"></a>
                            </div>
                            @endif
                            <div class="single-teacher-content text-center">
                                @if($row->hb_profile==NULL)
                                    <h2>{{$row->hb_name}}</h2>
                                @else
                                    <h2><a href="{{asset('public/files/honor/'.$row->hb_profile)}}" target="_blank">{{substr($row->hb_name,0,30)}}</a></h2>
                                @endif
                                <h4>{{substr($row->hb_designation,0,40)}}</h4>
                                <h4>{{ $row->hb_joining }}</h4>
                                <ul>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  	@endforeach
                </div>
                <!-- Pagination Start -->
                 <div class="shop_page_nav d-flex flex-row pb-10">
                    <ul class="page_nav d-flex flex-row"> 
                        {{ $honor->links() }}
                    </ul> 
                </div>
                <!-- Pagination Start -->
            </div>
        </div>
        <!-- Teacher End -->

@endsection


