<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //user show method
    public function index()
    {
        $data=DB::table('users')->where('is_admin',1)->where('role_admin',1)->get();
        return view('admin.user.index',compact('data'));
    }

    //user edit method
    public function edit($id)
    {
        $data=DB::table('users')->where('id',$id)->first();
        return view('admin.user.edit',compact('data'));
        //return response()->json($data);
    }

    public function userupdate(Request $request)
    {
        $data=array();
        $data['name']=$request->name;
        $data['designation']=$request->designation;
        $data['department']=$request->department;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['category']=$request->category;
        $data['slider']=$request->slider;
        $data['notice']=$request->notice;
        $data['about']=$request->about;
        $data['gallery']=$request->gallery;
        $data['event']=$request->event;
        $data['administration']=$request->administration;
        $data['researcher']=$request->researcher;
        $data['archive']=$request->archive;
        $data['publication']=$request->publication;
        $data['author']=$request->author;
        $data['newsletter']=$request->newsletter;
        $data['setting']=$request->setting;
        $data['is_admin']=1;
        $data['role_admin']=1;

      if ($request->file('avatar')){ 
        if (File::exists($request->old_avatar)) {
          unlink($request->old_avatar);
        }
        $photo=$request->avatar;
        $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->resize(32,32)->save('public/files/user/'.$photoname);
        $data['avatar']='public/files/user/'.$photoname;
        DB::table('users')->where('id',$request->id)->update($data);

      }else{
        $data['avatar']=$request->old_avatar;
        DB::table('users')->where('id',$request->id)->update($data);
      }
      $notification=array('message' => 'User Updated!','alert-type'=>'success' );
        return redirect()->route('user.index')->with($notification);
        
    }

    //user delete method
    public function destroy($id)
    {
        $data=DB::table('users')->where('id',$id)->first();

          if($image=$data->avatar) {
            unlink($image);
          }
          DB::table('users')->where('id',$id)->delete();

        $notification=array('message' => 'User Deleted!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
    }
}
