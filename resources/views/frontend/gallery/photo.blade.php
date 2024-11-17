@extends('layouts.app')
@section('content')
<div class="banner-area-wrapper">
    <div class="banner-area text-center photo-area">	
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content-wrapper">
                        <div class="banner-content">
                            <h2>photo</h2> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<!-- Banner Area End -->
<!-- Event Start -->
<div class="event-area three text-center pt-150 pb-150">
    <div class="container">
        <div class="row">
        	@foreach($photo as $row)
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-60">
                    <div class="event-img">
                        <a href="{{route('photo.all',$row->slug)}}">
                            <img src="{{asset($row->thumbnail)}}" alt="{{$row->title}}" style="width: 370px; height: 249px;">
                            <div class="course-hover">
                                <i class="fa fa-link"></i>
                            </div>
                        </a>
                    </div>
                    <span>{{substr($row->title,0,50)}}..</span><br>
                    <span>Date: {{ date('d, F Y', strtotime($row->date))}}</span>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination Start -->
         <div class="shop_page_nav d-flex flex-row pb-10">
            <ul class="page_nav d-flex flex-row"> 
                {{ $photo->links() }}
            </ul> 
        </div>
        <!-- Pagination Start -->
    </div>
</div>      
<!-- Event End -->
@endsection