@extends('layouts.app')
@section('content')
    
<!-- Banner Area Start -->
		<div class="banner-area-wrapper">
            <div class="banner-area text-center researcher-area">	
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner-content-wrapper">
                                <div class="banner-content">
                                    <h2>our researcher</h2> 
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
                	@foreach($prof as $row)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-teacher mb-45">
                            @if($row->cr_image!==NULL)
                            <div class="single-teacher-img">
                                <a href="#"><img src="{{asset($row->cr_image)}}" alt="{{$row->cr_name}}"></a>
                            </div>
                            @endif
                            <div class="single-teacher-content text-center">
                                <h2><a href="{{route('researcher.details',$row->slug)}}">{{substr($row->cr_name,0,30)}}</a></h2>
                                <h4>{{substr($row->cr_designation,0,41)}}</h4>
                                <h4>{{ $row->cr_joining }}</h4>
                                <ul>
                                    <li><a href="{{ $row->cr_facebook }}" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="{{ $row->cr_twitter }}"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="{{ $row->cr_linkedin }}"><i class="zmdi zmdi-linkedin"></i></a></li>
                                    <li><a href="{{ $row->cr_instagram }}"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="{{ $row->cr_youtube }}"><i class="zmdi zmdi-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  	@endforeach
                </div>
            </div>
        </div>
        <!-- Teacher End -->

@endsection


