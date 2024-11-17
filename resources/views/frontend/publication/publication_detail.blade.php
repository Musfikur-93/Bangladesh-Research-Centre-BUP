@extends('layouts.app')
@section('content')

<style type="text/css">
	 span{
		text-transform: capitalize; 
		color: black;
	}
	 h3{
		font-weight:700; 
		font-size: 18px; 
		color: black;
		font-family: "Open Sans",sans-serif;
	}
</style>

<!-- Mirrored from htmldemo.net/eduhome/eduhome/teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Aug 2022 05:39:45 GMT -->
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Publication Start -->
        <div class="teacher-details-area pt-100 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="teacher-details-img">
                            <img src="{{asset($pubdetail->publication_image)}}" alt="{{$pubdetail->publication_name}}" style="border-radius: 5px; width: 260px; height: 320px;">  
                        </div>
                        <div class="col-lg-3">
                            <div class="teacher-contact">
                                <a href="{{asset('public/files/publication/'.$pubdetail->publication_file)}}" target="_blank"><span style="font-weight:600">Download </span></a><br>
                                <a href="{{route('publication.artical',$pubdetail->publication_slug)}}"><span style="font-weight:600">Articals </span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="teacher-details-content ml-10">
                        	<h3>Publication Information</h3><br> 
                        	<span>publication name: {{$pubdetail->publication_name}}</span><br>
                        	<span>issue: {{ date('d, F Y', strtotime($pubdetail->issue_date))}}</span><br><br>
                            <h3>Editorial Advisors </h3><br>
                            <ul>
                                @foreach($eadvisor as $row)
                                <span style="font-weight: 700;">{{$row->eadvisor_name}} </span><br>
                                <span>{{$row->eadvisor_desig}} </span><br>
                                <span>{{$row->eadvisor_dept}} </span><br>
                                <span>{{$row->eadvisor_inst}} </span><br><br>
                                @endforeach
                            </ul><br>

                            <h3>Editorial Board </h3><br>
                            @if($pubdetail->chipatron_name)
                            <h3 style="font-size: 15px;">Chief Patron </h3>
                            <ul>
                                <span style="font-weight: 700">{{$pubdetail->chipatron_name}} </span><br>
                                <span>{{$pubdetail->chipatron_desig}} </span><br>
                                <!-- <span>{{$pubdetail->chipatron_dept}} </span><br> -->
                                <span>{{$pubdetail->chipatron_inst}} </span>
                            </ul><br>
                            <h3 style="font-size: 15px;">Patron </h3>
                            <ul>
                                <span style="font-weight: 700">{{$pubdetail->patron_name}} </span><br>
                                <span>{{$pubdetail->patron_desig}} </span><br>
                                <!-- <span>{{$pubdetail->patron_dept}} </span><br> -->
                                <span>{{$pubdetail->patron_inst}} </span>
                            </ul><br>
                            <h3 style="font-size: 15px;">Chief Editor </h3>
                            <ul>
                                <span style="font-weight: 700">{{$pubdetail->chiefeditor_name}} </span><br>
                                <span>{{$pubdetail->chiefeditor_desig}} </span><br>
                                <span>{{$pubdetail->chiefeditor_dept}} </span><br>
                                <span>{{$pubdetail->chiefeditor_inst}} </span>
                            </ul><br>
                            @endif

                            <h3 style="font-size: 15px;">Associate Editor </h3>
                            <ul>
                                @foreach($eboard as $row)
                                <span style="font-weight: 700;">{{$row->eboard_name}} </span><br>
                                <span>{{$row->eboard_desig}} </span><br>
                                <span>{{$row->eboard_dept}} </span><br>
                                <span>{{$row->eboard_inst}} </span><br><br>
                                @endforeach
                            </ul><br>

                            <h3>{{$pubdetail->chiefpatron_title}}</h3>
                            <p>{!! $pubdetail->chiefpatron_message !!}</p>
                            <ul>
                                <span style="font-weight: 700">{{$pubdetail->chiefpatron_name}} </span><br>
                                <span>{{$pubdetail->chiefpatron_desig}}<br>{{$pubdetail->chipatron_desig}} </span><br>
                                <span>{{$pubdetail->chiefpatron_dept}} </span><br>
                                <span>{{$pubdetail->chiefpatron_inst}} </span>
                            </ul><br>

                            <h3>{{$pubdetail->editor_title}}</h3>
                            <p>{!! $pubdetail->editor_note !!}</p>
                            <ul>
                                <span style="font-weight: 700">{{$pubdetail->editor_name}} </span><br>
                                <span>{{$pubdetail->editor_desig}} <br>{{$pubdetail->chiefeditor_desig}} </span><br>
                                <span>{{$pubdetail->editor_dept}} </span><br>
                                <span>{{$pubdetail->editor_inst}} </span>
                            </ul><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Teacher End -->  
    </body>
</html>

@endsection


