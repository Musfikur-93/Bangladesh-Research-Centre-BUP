@extends('layouts.app')
@section('content')
	
<!-- Banner Area Start -->
<div class="banner-area-wrapper">
    <div class="banner-area text-center researcher-area">	
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content-wrapper">
                        <div class="banner-content">
                            <h2>researcher / details</h2> 
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
                    <img src="{{asset($resdetail->cr_image)}}" alt="{{$resdetail->cr_name}}"> 
                    @if($resdetail->cr_profile!==NULL) 
                    <h2 class="mt-20"><a href="{{asset('public/files/professor/'.$resdetail->cr_profile)}}">Profile: {{$resdetail->cr_name}}</a></h2> 
                    @endif 
                </div>
            </div>
            <div class="col-md-7">
                <div class="teacher-details-content ml-50">
                    <h2>{{$resdetail->cr_name}}</h2>
                    <h5>{{$resdetail->cr_designation}}</h5>
                    @if($resdetail->cr_amessage!==NULL) 
                    <h4>{{$resdetail->cr_atitle}}</h4>
                    <p>{!!$resdetail->cr_amessage!!} </p>
                    @endif
                    <ul>
                        <li><span>degree: </span>{{$resdetail->cr_degree}}</li>
                        <li><span>experience: </span>{{$resdetail->cr_experience}}</li>
                        <!-- <li><span>hobbies: </span>music, travelling, catching fish</li> -->
                        <li><span>faculty/department: </span>{{$resdetail->cr_dept}}</li>
                        <li><span>joining date: </span>{{$resdetail->cr_joining}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="teacher-contact">
                    <h4>{{$resdetail->cr_ctitle}}</h4>
                    <p><span>mail me : </span>{{$resdetail->cr_email}}</p>
                    <p><span>make a call : </span>{{$resdetail->cr_phone}}</p>
                    <!-- <p><span>skype : </span> stuart.k</p> -->
                    <ul>
                        <li><a href="{{$resdetail->cr_facebook}}" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                        <li><a href="{{$resdetail->cr_twitter}}" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                        <li><a href="{{$resdetail->cr_linkedin}}" target="_blank"><i class="zmdi zmdi-linkedin"></i></a></li>
                        <li><a href="{{$resdetail->cr_instagram}}" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                        <li><a href="{{$resdetail->cr_youtube}}" target="_blank"><i class="zmdi zmdi-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="skill-area">
                    <h4>{{$resdetail->cr_stitle}}</h4>
                </div>  
                <div class="skill-wrapper">     
                    <div class="row">
                        <div class="col-md-4">
                            <div class="skill-bar-item">
                                <span>language</span>
                                <div class="progress">
                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: {{$resdetail->cr_slanguage}}; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="{{$resdetail->cr_slanguage}}" class="progress-bar wow fadeInLeft">
                                        <span class="text-top">{{$resdetail->cr_slanguage}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="skill-bar-item">
                                <span>team leader</span>
                                <div class="progress">
                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: {{$resdetail->cr_steam}}; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="{{$resdetail->cr_steam}}" class="progress-bar wow fadeInLeft">
                                        <span class="text-top">{{$resdetail->cr_steam}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="skill-bar-item">
                                <span>development</span>
                                <div class="progress">
                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: {{$resdetail->cr_sdevelopment}}; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="{{$resdetail->cr_sdevelopment}}" class="progress-bar wow fadeInLeft">
                                        <span class="text-top">{{$resdetail->cr_sdevelopment}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="skill-bar-item">
                                <span>design</span>
                                <div class="progress">
                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: {{$resdetail->cr_sdesign}}; visibility: ; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="{{$resdetail->cr_sdesign}}" class="progress-bar wow fadeInLeft">
                                        <span class="text-top">{{$resdetail->cr_sdesign}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="skill-bar-item">
                                <span>innovation</span>
                                <div class="progress">
                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: {{$resdetail->cr_sinnovation}}; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="{{$resdetail->cr_sinnovation}}" class="progress-bar wow fadeInLeft">
                                        <span class="text-top">{{$resdetail->cr_sinnovation}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="skill-bar-item">
                                <span>communication</span>
                                <div class="progress">
                                    <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: {{$resdetail->cr_scommunication}}; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="{{$resdetail->cr_scommunication}}" class="progress-bar wow fadeInLeft">
                                        <span class="text-top">{{$resdetail->cr_scommunication}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>     
            </div>
        </div>
    </div>
</div> 
</body>
<!-- Mirrored from htmldemo.net/eduhome/eduhome/teacher-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 05:39:50 GMT -->
</html>


@endsection