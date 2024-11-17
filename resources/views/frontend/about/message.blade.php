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
                                <h2>message</h2> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- Banner Area End -->
    <!-- About Start -->
    <div class="about-area pb-130" style="background-color: #2f353a;">
        <div class="container">
            <div class="row">
                @foreach($abtmessage as $row)
                <div class="col-md-4 col-sm-4 pt-160 about-img-one">
                    <img src="{{asset($row->cp_image)}}" alt="{{$row->cp_title}}" style="width: 250px; height: 250px; border:8px solid #86BC42;"><br><br>
                    <span style="text-align: justify; font-weight: 900; color: white;" class="hidden-sm">{{$row->cp_name}}</span><br>
                    <span style="text-align: justify; font-weight: 900; color: white;" class="hidden-sm">{{$row->cp_designation}}</span><br>
                    <span style="text-align: justify; font-weight: 900; color: white;" class="hidden-sm">{{$row->cp_organization}}</span>
                  </div>
                <div class="col-md-8 col-sm-8">
                    <div class="about-content">
                        <h2 style="color: white; font-size: 20px;">{{$row->cp_title}}</h2><br>
                        <p style="text-align: justify; font-weight: 600; color: white;">{{$row->cp_message}}</p><br><br>
                        <!--<p style="text-align: justify; font-weight: 900; color: white;" class="hidden-sm">{{$row->cp_regards}}</p><br><br><br>-->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- About End -->
</body>

<!-- Mirrored from htmldemo.net/eduhome/eduhome/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 05:39:32 GMT -->
</html>

@endsection