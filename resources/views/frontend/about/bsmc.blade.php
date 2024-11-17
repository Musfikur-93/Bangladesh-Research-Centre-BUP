@extends('layouts.app')
@section('content')
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Banner Area Start -->
    <div class="banner-area-wrapper">
        <div class="banner-area text-center">   
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner-content-wrapper">
                            <div class="banner-content">
                                <h2>about</h2> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- Banner Area End -->
    <!-- About Start -->
    <div class="about-area pb-155">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="about-content">
                        <h2>{{$abt->title}}</h2>
                        <p style="text-align: justify;">{{$abt->description}}</p>
                        @if($abt->mission_details)
                        <h2>{{$abt->mission}}</h2>
                        <p style="text-align: justify;" class="hidden-sm">{{$abt->mission_details}}</p>
                        @endif
                        @if($abt->vision_details)
                        <h2>{{$abt->vision}}</h2>
                        <p style="text-align: justify;" class="hidden-sm">{{$abt->vision_details}}</p>
                        @endif
                    </div>
                </div><br>
                <div class="col-md-5 pt-145">
                    <div class="about-img-front">
                        <img src="{{asset($abt->about_thumbnail)}}" style="width:547px; height: 408px; border-radius: 5px;" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

</body>

<!-- Mirrored from htmldemo.net/eduhome/eduhome/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 05:39:32 GMT -->
</html>

@endsection