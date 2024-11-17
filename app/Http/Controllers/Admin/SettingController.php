<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Seo;
use App\Models\Smtp;
use App\Models\Setting;
use Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //seo index method
    public function index()
    {
        $data=DB::table('seos')->first();
        return view('admin.setting.seo',compact('data'));
    }

    //seo update method
    public function update(Request $request, $id)
    {
        $data=array();
        $data['meta_title']=$request->meta_title;
        $data['meta_author']=$request->meta_author;
        $data['meta_tag']=$request->meta_tag;
        $data['meta_description']=$request->meta_description;
        $data['meta_description']=$request->meta_description;
        $data['meta_keyword']=$request->meta_keyword;
        $data['google_verification']=$request->google_verification;
        $data['google_analytics']=$request->google_analytics;
        $data['google_adsense']=$request->google_adsense;
        $data['alexa_verification']=$request->alexa_verification;

        DB::table('seos')->where('id',$id)->update($data);

        $notification=array('message' => 'Seo Setting Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //smtp index method
    public function smtp()
    {
        $data=Smtp::first();
        return view('admin.setting.smtp',compact('data'));
    }

    //smtp update method
    public function smtpupdate(Request $request,$id)
    {
        $data=Smtp::where('id',$id)->first();
        $data->update([
            'mailer' =>$request->mailer,
            'host'=>$request->host,
            'port'=>$request->port,
            'user_name'=>$request->user_name,
            'password'=>$request->password,
        ]);

        $notification=array('message' => 'SMTP Setting Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //website setting method
    public function setting()
    {
        $data=Setting::first();
        return view('admin.setting.website_setting',compact('data'));
    }

    //website update method
    public function websiteupdate(Request $request,$id)
    {
            $data=array();
            $data['phone_one'] =$request->phone_one;
            $data['phone_two']=$request->phone_two;
            $data['main_email']=$request->main_email;
            $data['support_email']=$request->support_email;
            $data['video_url']=$request->video_url;
            $data['fax']=$request->fax;
            $data['copyright']=$request->copyright;
            $data['link_one']=$request->link_one;
            $data['link_two']=$request->link_two;
            $data['link_three']=$request->link_three;
            $data['link_four']=$request->link_four;
            $data['link_five']=$request->link_five;
            $data['address']=$request->address;
            $data['facebook']=$request->facebook;
            $data['twitter']=$request->twitter;
            $data['linkedin']=$request->linkedin;
            $data['instagram']=$request->instagram;
            $data['youtube']=$request->youtube;

            if ($request->logo){
                if($request->old_logo){
                    unlink($request->old_logo);
                  }
            $photo=$request->logo;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(250,52)->save('public/files/setting/'.$photoname); 
            $data['logo']='public/files/setting/'.$photoname;
        }else{
            $data['logo']=$request->old_logo;
        }

        if ($request->favicon){
                if($request->old_favicon){
                    unlink($request->old_favicon);
                  }
            $photo=$request->favicon;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(50,50)->save('public/files/setting/'.$photoname); 
            $data['favicon']='public/files/setting/'.$photoname;
        }else{
            $data['favicon']=$request->old_favicon;
        }

        DB::table('settings')->where('id',$id)->update($data);

        $notification=array('message' => 'Website Setting Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
        
    }

    //newsletter method
    public function newsletter(Request $request)
    {
        $data=DB::table('newsletters')->get();
        return view('admin.newsletter.newsletter',compact('data'));
    }

    //newsletter destroy method
    public function destroy($id)
    {
        $data=DB::table('newsletters')->where('id',$id)->first();
        $data=DB::table('newsletters')->where('id',$id)->delete();
        $notification=array('message' => 'Newsletter Deleted!','alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }





}
