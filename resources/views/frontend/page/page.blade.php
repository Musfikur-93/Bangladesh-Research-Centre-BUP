@extends('layouts.app')
@section('content')

<!-- Banner Area Start -->
<div class="banner-area-wrapper">
    <div class="banner-area text-center">	
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content-wrapper">
                        <div class="banner-content">
                            <h2>{{$page->page_name}}</h2> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<!-- Banner Area End -->
<!-- Event Details Start -->
<div class="event-details-area blog-area pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="event-details">
                    <div class="event-details-content">
                        <p>{!! $page->page_description !!} </p>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Event Details End -->

@endsection