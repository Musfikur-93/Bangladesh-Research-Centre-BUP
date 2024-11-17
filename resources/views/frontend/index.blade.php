@extends('layouts.app')
@section('content')
    
<!-- Background Area Start -->
<section id="slider-container" class="slider-area two">
  <div id="owl-main" class="owl-carousel">
    @foreach($slider as $row)
    <div class="single-slide item" style="background-image: url({{ asset($row->slider_img) }});">
      <div class="slider-content-area">  
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1"> 
                        <div class="slide-content-wrapper">
                            <div class="slide-content text-center">
                                <h2 class="pt-220 text-light"> {{$row->title}} </h2>
                                <!-- <p>{{$row->description}}  </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.item -->
    @endforeach
</div>
  <!-- /.owl-carousel --> 
</section>
<!-- Background Area End -->

<!-- About Start -->
@if($about !== NULL)
<div class="about-area two pt-50 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="about-content">
                    <h2><span>{{$about->title}}</span></h2>
                    <p style="text-align: justify;">{{substr($about->description,0,300)}}...</p>
                    <a class="default-btn" href="{{route('bsmc')}}">read more</a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 pt-50">
                <div class="about-img">
                    <img src="{{asset($about->about_thumbnail)}}" alt="about" style="width:547px; height: 408px; border-radius: 5px;">
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- About End -->

<!-- Testimonial Start -->
<div class="about-area courses-area two pt-50 pb-30">
    <div class="container">
        @foreach($message as $row)
        <div class="row single-course">
            <div class="col-md-8 col-sm-8">
                <div class="about-content">
                    <h2><span>{{$row->cp_title}}</span></h2>
                    <p style="text-align: justify; color:#fff;">{{substr($row->cp_message,0,300)}}..</p>
                    <a class="default-btn" href="{{route('message')}}">read more</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="about-img-home">
                    <img src="{{asset($row->cp_image)}}" alt="{{$row->cp_title}}" style="width: 250px; height: 250px; border:8px solid #86BC42;">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Testimonial End -->

<!-- Notice Start -->
<section class="notice-area two pt-50 pb-20">
    <div class="container">
        <div class="row notice-content">
            <div class="col-md-6">
                <div class="notice-right-wrapper mb-25 pb-25">
                    <h3>TAKE A VIDEO TOUR</h3>
                    <div class="notice-video">
                        <div class="video-icon video-hover">
                            <a class="video-popup" href="https://www.youtube.com/watch?v={{$setting->video_url}}">
                                <i class="zmdi zmdi-play"></i>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="notice-left-wrapper">  
                    <h3>notice board</h3>
                    <div class="notice-left">
                        @foreach($notice as $row)
                          @if($row->title!==NULL)
                        <div class="single-notice-left mb-23 pb-20">
                            <h4>{{ date('d, F Y', strtotime($row->date))}}</h4>
                            <a href="{{asset('public/files/notice/'.$row->notice_file)}}" target="_blank">
                                <p>{{substr($row->title,0,200)}}...</p>
                            </a>
                        </div>
                          @endif
                        @endforeach
                        <a class="default-btn" href="{{route('notice')}}">see all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Notice End -->

<!-- Publication Area Start -->
<div class="blog-area courses-area two pt-20 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <img src="{{asset('public/frontend')}}/img/icon/section.png" alt="section-title">
                    <h2>PUBLICATIONS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($publication as $row)
            <div class="col-lg-4 col-md-6">
                <div class="single-blog single-course">
                    <div class="blog-img course-img">
                        <a href="{{route('publication.details',$row->publication_slug)}}">
                            <img src="{{asset($row->publication_image)}}" alt="{{$row->publication_name}}" style="width: 370px; height: 246px;">
                        </a>
                        <div class="blog-hover">
                            
                        </div>
                    </div>
                    <div class="blog-content course-content">
                        <div class="blog-top">
                            <p>{{ date('d, F Y', strtotime($row->issue_date))}}</p>
                        </div>
                        <div class="blog-bottom">
                            <h2>{{substr($row->publication_name,0,43)}}..</h2>
                            <a href="{{route('publication.details',$row->publication_slug)}}">read more</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Publication Area End -->

<!-- Event Area Start -->
<div class="event-area two text-center pt-30 pb-50">
    <div class="container">
        <div class="row">
             <div class="col-12">
                <div class="section-title">
                    <img src="{{asset('public/frontend')}}/img/icon/section.png" alt="section-title">
                    <h2>EVENTS AND NEWS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($event as $row)
            <div class="col-lg-6">  
                <div class="single-event mb-35">
                    <div class="event-img">
                        <a href="#"><img src="{{asset($row->e_thumbnail)}}" alt="event" style="width:214px; height:197px;"></a>
                    </div>
                    <div class="event-content text-start">
                        <h3>{{ date('d, F Y', strtotime($row->date))}}</h3>
                        <h4><a href="{{route('event.details',$row->e_title)}}">{{substr($row->e_title,0,25)}}..</a></h4>
                        <ul>
                            <li><i class="fa fa-clock-o"></i>{{$row->e_time}}</li>
                            <li><i class="fa fa-map-marker"></i>{{substr($row->e_venue,0,25)}}</li>
                        </ul>
                        <div class="event-content-right">
                            <a class="default-btn" href="{{route('event.details',$row->e_title)}}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Event Area End -->

@endsection


