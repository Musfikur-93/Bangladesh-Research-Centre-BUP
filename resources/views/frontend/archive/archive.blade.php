@extends('layouts.app')
@section('content')
   
<!-- Mirrored from htmldemo.net/eduhome/eduhome/teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 05:39:45 GMT -->
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Banner Area Start -->
        <div class="banner-area-wrapper">
            <div class="banner-area text-center archive-area">   
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner-content-wrapper">
                                <div class="banner-content">
                                    <h2>archive</h2> 
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
                    @foreach($archive as $row)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-teacher mb-45">
                            <div class="single-teacher-img">
                                <img src="{{asset($row->publication_image)}}" style="width: 300px; height:250px;" alt="{{$row->publication_name}}">  
                            </div>
                            <div class="single-publication-content text-center">
                                <h2><a href="{{asset('public/files/publication/'.$row->publication_file)}}" target="_blank">{{substr($row->publication_name,0,33)}}</a></h2>
                                <h4 class="text-success">month: {{ date('F, Y', strtotime($row->month))}}</h4>
                            </div>
                        </div>
                        <span class="text-success" style="font-size:18px; font-weight: 800;">{{$row->title}}</span>
                    </div>
                   @endforeach
                </div>
                <!-- Pagination Start -->
                 <div class="shop_page_nav d-flex flex-row pb-10">
                    <ul class="page_nav d-flex flex-row"> 
                        {{ $archive->links() }}
                    </ul> 
                </div>
                <!-- Pagination Start -->
            </div>
        </div>
        <!-- Teacher End -->
    </body>
<!-- Mirrored from htmldemo.net/eduhome/eduhome/teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 05:39:50 GMT -->
</html>


@endsection


