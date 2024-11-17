<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset($setting->favicon)}}">

        <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/meanmenu.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/et-line-icon.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/reset.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/ionicons.min.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/file/lightbox2-dev/dist/css/lightbox.min.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/file/toastr/content/toastr.min.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/style.css">
        <link rel="stylesheet" href="{{asset('public/frontend')}}/css/responsive.css">
        
    </head>
<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header Area Start -->
<header class="top">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="header-top-left">
                        <p>HAVE ANY QUESTION ?  {{$setting->phone_two}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="header-top-left">
                        <p><a style="text-decoration: none; color: white; text-transform:lowercase;" href="mailto:{{$setting->support_email}}">{{$setting->support_email}}</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="header-top-right text-md-end text-center">
                        <ul>
                            <li><a href="{{route('notice')}}">notice</a></li>
                            <li><a href="{{route('archive')}}">archive</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-area two header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-5">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{asset($setting->logo)}}" alt="logo"/></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-7">
                    <div class="content-wrapper text-end">
                        <!-- Main Menu Start -->
                        <div class="main-menu">
                            <nav>
                                <ul>
                                  <li><a href="{{url('/')}}">Home</a></li>
                                  @php
                                    $category=\App\Models\Category::all();
                                  @endphp

                                    @foreach($category as $row)
                                        @php
                                            $subcat=DB::table('subcategories')->where('category_id',$row->id)->get();
                                        @endphp                                           
                                    <li class="hidden-sm">
                                        <a href="{{route($row->category_slug)}}">{{$row->category_name}}</a>
                                       @if($subcat->count()) 
                                        <ul>
                                            @foreach($subcat as $row)
                                              <li class="hidden-sm">
                                                  <a href="{{route($row->subcategory_slug)}}">{{$row->subcategory_name}}</a>
                                              </li>
                                            @endforeach
                                        </ul> 
                                       @endif 
                                    </li>
                                    @endforeach 
                              </ul>
                            </nav>
                        </div>
                        <!-- Main Menu End -->
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile-menu hidden-sm"></div> 
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->

    @yield('content')

<!-- Subscribe Area Start -->
 <div class="subscribe-area pt-60 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="subscribe-content section-title text-center">
                    <h2>subscribe our publication</h2>
                    <p>we will send the latest publication alert. </p>
                </div>
                <div class="newsletter-form mc_embed_signup">
                    <form action="{{route('newsletter.store')}}" method="post" id="newsletter">
                        @csrf
                        <div id="mc_embed_signup_scroll" class="mc-form"> 
                            <input type="email" name="email" placeholder="Enter your e-mail address" required="required">
                            <button class="default-btn" type="submit"><span>subscribe</span></button> 
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Subscribe Area End -->

<!-- Footer Area Start -->
@php
    $page_one=DB::table('pages')->where('page_position',1)->get();
    $page_two=DB::table('pages')->where('page_position',2)->get();
@endphp
 <footer class="footer-area">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-widget pr-60">
                        <div class="footer-logo pb-20">
                            <a href="{{url('/')}}"><img src="{{asset($setting->logo)}}" alt="logo"></a>
                        </div>
                        <p>{!!$setting->address!!}</p>
                        <p><i class="fa fa-phone"></i> {{$setting->phone_one}}</p>
                        <p><i class="fa fa-fax"></i> {{$setting->fax}}</p>
                        <p><i class="fa fa-envelope"></i> {{$setting->main_email}}</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="{{$setting->facebook}}" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="{{$setting->twitter}}" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a href="{{$setting->linkedin}}" target="_blank"><i class="zmdi zmdi-linkedin"></i></a></li>
                                <li><a href="{{$setting->instagram}}" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a href="{{$setting->youtube}}" target="_blank"><i class="zmdi zmdi-youtube"></i></a></li>
                            </ul>    
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-widget">
                        <h3>information</h3>
                        <ul>
                            @foreach($page_one as $row)
                            <li><a href="{{route('page.view',$row->page_slug)}}">{{$row->page_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 pt-4 pt-lg-0">
                    <div class="single-widget">
                        <h3>information</h3>
                        <ul>
                            @foreach($page_two as $row)
                            <li><a href="{{route('page.view',$row->page_slug)}}">{{$row->page_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 pt-4 pt-lg-0">
                    <div class="single-widget">
                        <h3>useful links</h3>
                        <ul>
                            
                            <li><a href="{{$setting->link_one}}" target="_blank">BUP</a></li>
                            <li><a href="{{$setting->link_two}}" target="_blank">UGC</a></li>
                            <li><a href="{{$setting->link_three}}" target="_blank">bangabandhu memorial trust</a></li>
                            <li><a href="{{$setting->link_four}}" target="_blank"></a></li>
                            <li><a href="{{$setting->link_five}}" target="_blank"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <div class="footer-bottom text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>{{$setting->copyright}}</p>
                </div> 
            </div>
        </div>    
    </div>
</footer>

<!-- Footer Area End -->

<script src="{{asset('public/frontend')}}/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{asset('public/frontend')}}/js/vendor/modernizr-3.11.2.min.js"></script>
<script src="{{asset('public/frontend')}}/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="{{asset('public/frontend')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('public/frontend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('public/frontend')}}/js/jquery.meanmenu.js"></script>
<script src="{{asset('public/frontend')}}/js/jquery.magnific-popup.js"></script>
<script src="{{asset('public/frontend')}}/js/ajax-mail.js"></script>
<script src="{{asset('public/frontend')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('public/frontend')}}/js/jquery.mb.YTPlayer.js"></script>
<script src="{{asset('public/frontend')}}/js/jquery.nicescroll.min.js"></script>
<script src="{{asset('public/frontend')}}/js/plugins.js"></script>
<script src="{{asset('public/frontend')}}/file/lightbox2-dev/dist/js/lightbox.min.js"></script>
<script src="{{asset('public/frontend')}}/file/toastr/scripts/toastr.min.js"></script>
<script src="{{asset('public/frontend')}}/js/main.js"></script>

<script type="text/javascript">
// newsletter ajax call for loading cara 
 $('#newsletter').submit(function(e){
   e.preventDefault();
   var url = $(this).attr('action');
   var request = $(this).serialize();
   $.ajax({
     url:url,
     type:'post',
     async:false,
     data:request,
     success:function(data){
       toastr.success(data);
         $('#newsletter')[0].reset();
         //}
       });
     });
</script>

<script type="text/javascript">
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop:true,
        nav: true,
        navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>",],
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
    });
    
    lightbox.option({
      'resizeDuration': 400,
      'wrapAround': true,
      'fitImagesInViewport': true,
      'fadeDuration': 600,
      'imageFadeDuration': 600,
      'positionFromTop':  300
    });

</script>

<script type="text/javascript">
 @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
      case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
      case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
      case 'warning':
        toastr.warning("{{ Session::get('message') }}");
      break;
      case 'error':
        toastr.error("{{ Session::get('message') }}");
     }
  @endif
</script>

</body>
<!-- Mirrored from htmldemo.net/eduhome/eduhome/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 05:39:07 GMT -->
</html>
