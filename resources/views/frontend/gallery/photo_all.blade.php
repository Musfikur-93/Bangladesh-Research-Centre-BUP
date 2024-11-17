@extends('layouts.app')
@section('content')
<!-- photo view Start -->
<div class="event-area three text-center pt-50 pb-50">
    <div class="container">
        <div class="row">
        	@php
				$img=json_decode($photoview->images,true);
			@endphp
            
        	@foreach($img as $key => $image)
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-60">
                    <div class="event-img">
                        <a href="{{asset('public/files/gallery/'.$image)}}" data-lightbox="photo">
                            <img src="{{asset('public/files/gallery/'.$image)}}" style="width: 370px; height: 200px;">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
        	<p>{!! $photoview->description !!}</p>
        </div>
    </div>
</div>      
<!-- photo view End -->

@endsection

