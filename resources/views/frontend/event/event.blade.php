@extends('layouts.app')
@section('content')
<div class="banner-area-wrapper">
    <div class="banner-area text-center events-area">	
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content-wrapper">
                        <div class="banner-content">
                            <h2>event</h2> 
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
        	@foreach($event as $row)
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-60">
                    @if($row->e_thumbnail!==NULL)
                    <div class="event-img">
                        <a href="{{route('event.details',$row->e_title)}}">
                            <img src="{{asset($row->e_thumbnail)}}" alt="{{$row->e_title}}" style="width:375px; height:253px;">
                            <div class="course-hover">
                                <i class="fa fa-link"></i>
                            </div>
                        </a>
                        <div class="event-date">
                            <h3>{{ date('d', strtotime($row->date))}} <span>{{ date('F Y', strtotime($row->date))}}</span></h3>  
                        </div>
                    </div>
                    @endif
                    <div class="event-content text-start">
                        <h4><a href="{{route('event.details',$row->e_title)}}">{{substr($row->e_title,0,45)}}..</a></h4>
                        <ul>
                            <li><span>time:</span> {{$row->e_time}}</li>
                            <li><span>venue</span> {{$row->e_venue}}</li>
                        </ul>
                        <div class="event-content-right">
                            <a class="default-btn" href="{{route('event.details',$row->e_title)}}">read more</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination Start -->
         <div class="shop_page_nav d-flex flex-row pb-10">
            <ul class="page_nav d-flex flex-row"> 
                {{ $event->links() }}
            </ul> 
        </div>
        <!-- Pagination Start -->
    </div>
</div>      
<!-- Event End -->
@endsection