<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Notice;
use App\Models\Event;
use App\Models\Publication;
use App\Models\Slider;
use App\Models\Administration;
use App\Models\Member;
use DB;
use Mail;
use App\Mail\NewsletterMail;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $about=About::latest()->first();
        $notice=Notice::where('status',1)->orderBy('id','DESC')->latest()->limit(10)->get();
        $event=DB::table('events')->where('status',1)->orderBy('id','DESC')->latest()->limit(4)->get();
        $message=DB::table('cpmessage')->orderBy('id','ASC')->get();
        $publication=Publication::where('status',1)->orderBy('id','DESC')->limit(3)->latest()->get();
        $slider=Slider::where('status',1)->orderBy('id','DESC')->latest()->get();
        return view('frontend.index',compact('about','notice','event','message','publication','slider'));
    }

    //about (only for category route name er jonno)
    public function aboutft(Request $request)
    {
        $about=DB::table('abouts')->first();
        return redirect()->back();
    }

    //bsmc route
    public function aboutbsmc(Request $request)
    {
        $abt=DB::table('abouts')->first();
        return view('frontend.about.bsmc',compact('abt'));
    }

    //bsmc route
    public function aboutmessage(Request $request)
    {
        $abtmessage=DB::table('cpmessage')->get();
        return view('frontend.about.message',compact('abtmessage'));
    }

    //office (only for category route name er jonno)
    public function officeft(Request $request)
    {
        $office=DB::table('administrations')->first();
        return redirect()->back();
    }

    //employee route
    public function employee(Request $request)
    {
        $employee=DB::table('administrations')->where('status',1)->orderBy('id','ASC')->latest()->paginate(16);
        return view('frontend.office.employee.employee',compact('employee'));
    }

    //employee details route
    public function details($slug)
    {
        $detail=DB::table('administrations')->where('slug',$slug)->first();
        return view('frontend.office.employee.details',compact('detail'));
    }

     //member route
    public function member(Request $request)
    {
        $steering=DB::table('members')->where('status',1)->where('steering_committee',1)->paginate(15);
        $finance=DB::table('members')->where('status',1)->where('finance_committee',1)->paginate(15);
        $syndicate=DB::table('members')->where('status',1)->where('syndicate_committee',1)->paginate(15);
        $seneate=DB::table('members')->where('status',1)->where('seneate_committee',1)->paginate(15);
        $academic=DB::table('members')->where('status',1)->where('academic_councile',1)->paginate(15);
        return view('frontend.member.member',compact('steering','finance','syndicate','seneate','academic'));
    }

    //publication route
    public function publication(Request $request)
    {
        $pub=DB::table('publications')->where('status',1)->orderBy('id','DESC')->latest()->paginate(30);
         return view('frontend.publication.publication',compact('pub'));
    }

    //publication details route
    public function publicationview($publication_slug)
    {
        $pubdetail=DB::table('publications')->where('publication_slug',$publication_slug)->first();
        $eadvisor=DB::table('eadvisors')->Join('publications','eadvisors.publication_id','=','publications.id')->where('publication_slug',$publication_slug)->get();
        $eboard=DB::table('eboards')->Join('publications','eboards.publication_id','=','publications.id')->where('publication_slug',$publication_slug)->get();
        
        return view('frontend.publication.publication_detail',compact('pubdetail','eadvisor','eboard'));
    }

    //artical route
    public function articalview($publication_slug)
    {
        $artical=DB::table('articals')
        ->Join('publications','articals.publication_id','=','publications.id')
        ->Join('authors','articals.author_id','=','authors.id')
        ->where('publication_slug',$publication_slug)->paginate(10);

        return view('frontend.artical.articals',compact('artical'));
    }

     //researchers (only for category route name er jonno)
    public function researchers(Request $request)
    {
        $res=DB::table('crs')->get();
        return redirect()->back();
    }

    //researcher all route
    public function professor(Request $request)
    {
        $prof=DB::table('crs')->where('status',1)->orderBy('id','ASC')->get();
        return view('frontend.professor.professor',compact('prof'));
    }

    //researcher details route
    public function resdetail($slug)
    {
        $resdetail=DB::table('crs')->where('slug',$slug)->first();
        return view('frontend.professor.details',compact('resdetail'));
    }

    //honor board member
    public function honormember(Request $request)
    {
        $honor=DB::table('honorboards')->where('status',1)->orderBy('id','ASC')->paginate(20);
        return view('frontend.honorboard.honor',compact('honor'));
    }

    //notice route
    public function allnotice(Request $request)
    {
        $allnotice=DB::table('notices')->where('status',1)->orderBy('id','DESC')->paginate(20);
        return view('frontend.notice.notice',compact('allnotice'));
    }

    //event and news route
    public function eventnews(Request $request)
    {
        $event=DB::table('events')->where('status',1)->orderBy('id','DESC')->paginate(20);
        return view('frontend.event.event',compact('event'));
    }

    //event and news route
    public function eventnewsdetail($e_title)
    {
        $eventdetail=DB::table('events')->where('e_title',$e_title)->first();
        return view('frontend.event.details',compact('eventdetail'));
    }

    //event and news route
    public function allarchive(Request $request)
    {
        $archive=DB::table('archives')->Join('publications','archives.publication_id','=','publications.id')->paginate(20);
        return view('frontend.archive.archive',compact('archive'));
    }

    //gallery (only for category route name er jonno)
    public function gallery(Request $request)
    {
        $gallery=DB::table('videos')->get();
        return redirect()->back();
    }

    //video route
    public function allvideo(Request $request)
    {
        $video=DB::table('videos')->where('status',1)->orderBy('id','DESC')->paginate(30);
        return view('frontend.gallery.video',compact('video'));
    }

    //photo route
    public function allphoto(Request $request)
    {
        $photo=DB::table('photos')->where('status',1)->orderBy('id','DESC')->paginate(30);
        return view('frontend.gallery.photo',compact('photo'));
    }

    //photo view route
    public function photoview($slug)
    {
        $photoview=DB::table('photos')->where('slug',$slug)->first();
        return view('frontend.gallery.photo_all',compact('photoview'));
    }

    //custom page view method
    public function pageview($page_slug)
    {
      $page=DB::table('pages')->where('page_slug', $page_slug)->first();
          return view('frontend.page.page',compact('page'));
    }

    //newsletter method
    public function newsletterstore(Request $request)
    {
        $email=$request->email;
        $check=DB::table('newsletters')->where('email',$email)->first();
        if($check){
            $notification=array('message' => 'Email Already Exist','alert-type'=>'error' );
          return redirect()->back()->with($notification);
        }else{
            $data=array();
            $data['email']=$request->email;
            Mail::to($request->email)->send(new NewsletterMail);
            DB::table('newsletters')->insert($data);
            $notification=array('message' => 'Thanks for subscribe us!','alert-type'=>'info' );
          return redirect()->back()->with($notification);
        }
    }
     

}
