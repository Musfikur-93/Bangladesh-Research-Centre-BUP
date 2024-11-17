@extends('layouts.app')
@section('content')

<!-- Banner Area Start -->
		<div class="banner-area-wrapper">
            <div class="banner-area text-center events-area">	
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner-content-wrapper">
                                <div class="banner-content">
                                    <h2>event / details</h2> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
		<!-- Banner Area End -->
        <!-- Event Details Start -->
        <div class="event-details-area blog-area pt-150 pb-140">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="event-details">
                            <div class="event-details-img">
                                <img src="{{asset($eventdetail->e_thumbnail)}}" alt="{{$eventdetail->e_title}}">
                                <div class="event-date">
                                    <h3>{{ date('d', strtotime($eventdetail->date))}} <span>{{ date('F Y', strtotime($eventdetail->date))}}</span></h3>  
                                </div>
                            </div>
                            <div class="event-details-content">
                                <h2>{{$eventdetail->e_title}}</h2>
                                <ul>
                                    <li><span>time : </span>{{$eventdetail->e_time}}</li>
                                    <li><span>venue : </span>{{$eventdetail->e_venue}}</li>
                                </ul>
                                <p>{!! $eventdetail->e_des !!} </p>
                                <div class="speakers-area fix">
                                    <h4>speakers</h4>
                                    <div class="single-speaker">
                                        <div class="speaker-img">
                                            <img src="{{asset($eventdetail->keynote_img)}}" alt="{{$eventdetail->keynote_name}}">
                                        </div>
                                        <div class="speaker-name">
                                            <p>{{$eventdetail->keynote_type}} </p><br>
                                            <h5>{{$eventdetail->keynote_name}}</h5>
                                            <p>{{$eventdetail->keynote_desig}} <br> {{$eventdetail->keynote_organization}} </p>
                                        </div>
                                    </div>
                                    <div class="single-speaker">
                                        <div class="speaker-img">
                                            <img src="{{asset($eventdetail->chief_img)}}" alt="{{$eventdetail->chief_name}}">
                                        </div>
                                        <div class="speaker-name">
                                            <p>{{$eventdetail->chief_type}} </p><br>
                                            <h5>{{$eventdetail->chief_name}}</h5>
                                            <p>{{$eventdetail->chief_desig}} <br> {{$eventdetail->chief_organization}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Event Details End -->

@endsection