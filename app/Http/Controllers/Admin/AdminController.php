<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use DB;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //admin after login
    public function admin()
    {
        $user=DB::table('users')->where('is_admin','1')->where('role_admin','1')->orderBy('id','DESC')->get();
        $sli=DB::table('sliders')->count();
        $not=DB::table('notices')->count();
        $vid=DB::table('videos')->count();
        $pho=DB::table('photos')->count();
        $evt=DB::table('events')->count();
        $emp=DB::table('administrations')->count();
        $mem=DB::table('members')->count();
        $res=DB::table('crs')->count();
        $hres=DB::table('honorboards')->count();
        $arc=DB::table('archives')->count();
        $pub=DB::table('publications')->count();
        $art=DB::table('articals')->count();
        $aut=DB::table('authors')->count();
        $new=DB::table('newsletters')->count();
        $pag=DB::table('pages')->count();
        return view('admin.home',compact('user','sli','not','vid','pho','evt','emp','mem','res','hres','arc','pub','art','aut','new','pag'));
    }

    //admin custom logout method
    public function logout()
    {
        Auth::logout();
        $notification=array('message' => 'You are logged out!', 'alert-type' => 'info');
        return redirect()->route('admin.login')->with($notification);
    }

    //admin password change method
    public function passwordchange()
    {
        return view('admin.profile.password_change');
    }

    //admin password update method
    public function passwordupdate(Request $request)
    {
        $validated = $request->validate([
        'old_password' => 'required',
        'password' => 'required|min:8|confirmed',
        ]);

        $current_password=Auth::user()->password;

        $oldpass=$request->old_password;
        $new_password=$request->password;

        if (Hash::check($oldpass,$current_password)) {
            $user=User::findOrfail(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification=array('message' => 'Your password changed!','alert-type'=>'success' );
            return redirect()->route('admin.login')->with($notification);
        }else{
            $notification=array('message' => 'Your old password Not Matched!','alert-type'=>'error' );
            return redirect()->back()->with($notification);
        }
    }
}
