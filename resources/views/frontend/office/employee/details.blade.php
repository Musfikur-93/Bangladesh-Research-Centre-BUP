@extends('layouts.app')
@section('content')

<!-- Mirrored from htmldemo.net/eduhome/eduhome/teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 05:39:45 GMT -->
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Banner Area Start -->
        <div class="banner-area-wrapper">
            <div class="banner-area text-center employee-area">   
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner-content-wrapper">
                                <div class="banner-content">
                                    <h2>employee / details</h2> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <!-- Banner Area End -->
        <!-- Teacher Start -->
        <div class="teacher-details-area pt-150 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="teacher-details-img">
                            <img src="{{asset($detail->photo)}}" alt="{{$detail->name}}">  
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="teacher-details-content ml-50">
                            <h2>{{$detail->name}}</h2>
                            <h5>{{$detail->designation}}</h5>
                            <ul>
                                <li><span>degree: </span>{{$detail->degree}}</li>
                                <li><span>experience: </span>{{$detail->experience}}</li>
                                <li><span>faculty/office: </span>{{$detail->office}}</li>
                                <li><span>joining date: </span>{{$detail->joining_date}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="teacher-contact">
                        <h4>{{$detail->contact}}</h4>
                        <p><span>mail me : </span>{{$detail->email}}</p>
                        <p><span>make a call : </span>{{$detail->phone}}</p>
                        <ul>
                            <li><a href="{{$detail->facebook}}" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a href="{{$detail->twitter}}" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a href="{{$detail->linkedin}}" target="_blank"><i class="zmdi zmdi-linkedin"></i></a></li>
                            <li><a href="{{$detail->youtube}}" target="_blank"><i class="zmdi zmdi-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Teacher End -->  
    </body>
</html>

@endsection


