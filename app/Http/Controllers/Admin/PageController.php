<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Image;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    //page index method
    public function index()
    {
        $data=Page::latest()->get();
        return view('admin.setting.page.index',compact('data'));
    }

    //page create method
    public function create()
    {
        return view('admin.setting.page.create');
    }

    //page store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'page_name' => 'required|unique:pages',
        ]);

        $slug=Str::slug($request->page_name, '-');

            $data=array();
            $data['page_position'] =$request->page_position;
            $data['page_name'] =$request->page_name;
            $data['page_slug']=Str::slug($request->page_name, '-');
            $data['page_title']=$request->page_title;
            $data['page_description']=$request->page_description;

            if($request->file('page_thumbnail')){
            $photo=$request->page_thumbnail;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(1348,650)->save('public/files/pages/'.$photoname);
            $data['page_thumbnail']='public/files/pages/'.$photoname; 
           }

           DB::table('pages')->insert($data);

            $notification=array('message' => 'Page Created!','alert-type'=>'success' );
            return redirect()->back()->with($notification);
    }

    //page edit method
    public function edit($id)
    {
        $data=DB::table('pages')->where('id',$id)->first();
        return view('admin.setting.page.edit',compact('data'));
    }

    //page update method
    public function update(Request $request, $id)
    {
        
        $slug=Str::slug($request->page_name, '-');

            $data=array();
            $data['page_position'] =$request->page_position;
            $data['page_name'] =$request->page_name;
            $data['page_slug']=Str::slug($request->page_name, '-');
            $data['page_title']=$request->page_title;
            $data['page_description']=$request->page_description;

            if($request->file('page_thumbnail')){
                if (File::exists($request->old_thumbnail)){
                  unlink($request->old_thumbnail);
                }
            $photo=$request->page_thumbnail;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(1348,650)->save('public/files/pages/'.$photoname);
            $data['page_thumbnail']='public/files/pages/'.$photoname;
            DB::table('pages')->where('id',$id)->update($data);
           }else{
                $data['page_thumbnail']=$request->old_thumbnail;
                DB::table('pages')->where('id',$id)->update($data);
           }
            //DB::table('pages')->where('id',$id)->update($data);
            $notification=array('message' => 'Page Updated!','alert-type'=>'success' );
            return redirect()->route('page.index')->with($notification);

     }

    //page delete method
    public function destroy($id)
    {
       $data=DB::table('pages')->where('id',$id)->first();

          $image=$data->page_thumbnail;

          if (File::exists($image)) {
            unlink($image);
          }
          DB::table('pages')->where('id',$id)->delete();

          $notification=array('message' => 'Pages Deleted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }
}
