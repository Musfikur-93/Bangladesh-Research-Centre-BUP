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
                                    <h2>employee</h2> 
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
                    @foreach($employee as $row)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-teacher mb-45">
                            <div class="single-teacher-img">
                                <a href="{{route('employee.details',$row->slug)}}"><img src="{{asset($row->photo)}}" style="height:280px;" alt="administration"></a>  
                            </div>
                            <div class="single-teacher-content text-center">
                                <h2><a href="{{route('employee.details',$row->slug)}}">{{substr($row->name,0,30)}}</a></h2>
                                <h4>{{substr($row->designation,0,40)}}</h4>
                                <h4>Joining: {{$row->joining_date}}</h4>
                                <ul>
                                    <li><a href="{{ $row->facebook }}" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="{{ $row->twitter }}" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="{{ $row->linkedin }}" target="_blank"><i class="zmdi zmdi-linkedin"></i></a></li>
                                    <li><a href="{{ $row->youtube }}" target="_blank"><i class="zmdi zmdi-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
                 
                <!-- Pagination Start -->
                 <div class="shop_page_nav d-flex flex-row pb-10">
                    <ul class="page_nav d-flex flex-row"> 
                        {{ $employee->links() }}
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


