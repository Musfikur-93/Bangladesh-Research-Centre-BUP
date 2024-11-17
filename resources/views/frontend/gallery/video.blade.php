@extends('layouts.app')
@section('content')
<!-- Banner Area Start -->
<div class="banner-area-wrapper">
    <div class="banner-area text-center video-area">   
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content-wrapper">
                        <div class="banner-content">
                            <h2>video</h2> 
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
            @foreach($video as $row)
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-60">
                    <div class="event-img">
                        <div class="ratio ratio-16x9">
                          <iframe src="https://www.youtube.com/embed/{{$row->embed_code}}" title="{{$row->title}}" allowfullscreen></iframe>
                        </div>
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
                {{ $video->links() }}
            </ul> 
        </div>
        <!-- Pagination Start -->
    </div>
</div>      
<!-- Event End -->


@endsection