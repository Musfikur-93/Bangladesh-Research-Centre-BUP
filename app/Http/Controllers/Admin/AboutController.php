<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\About;
use File;
use Image;

class AboutController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    //about index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=About::latest()->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){

                        $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                            <a href="'.route('about.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="about_delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

        return view('admin.about.index');
    }

    //about store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|unique:abouts|max:55',
        ]);


        $data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
        $data['vision']=$request->vision;
        $data['vision_details']=$request->vision_details;
        $data['mission']=$request->mission;
        $data['mission_details']=$request->mission_details;

        if ($request->file('about_thumbnail')){
            $photo=$request->about_thumbnail;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(547,408)->save('public/files/about/'.$photoname); //image intervention
          $data['about_thumbnail']='public/files/about/'.$photoname; //public/files/slider/plus-point.jpg
        }

        DB::table('abouts')->insert($data);

        $notification=array('message' => 'About Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //about edit method
    public function edit($id)
    {
        $data=DB::table('abouts')->where('id',$id)->first();
        return view('admin.about.edit',compact('data'));
    }

    //about update method
    public function update(Request $request)
    {
        $data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
        $data['vision']=$request->vision;
        $data['vision_details']=$request->vision_details;
        $data['mission']=$request->mission;
        $data['mission_details']=$request->mission_details;

        if ($request->file('about_thumbnail')){
            if (File::exists($request->old_thumbnail)){
              unlink($request->old_thumbnail);
            }
            $photo=$request->about_thumbnail;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(547,408)->save('public/files/about/'.$photoname); 
          $data['about_thumbnail']='public/files/about/'.$photoname;
          DB::table('abouts')->where('id',$request->id)->update($data);

          $notification=array('message' => 'About Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
        }else{
            $data['about_thumbnail']=$request->old_thumbnail;
            DB::table('abouts')->where('id',$request->id)->update($data);
            $notification=array('message' => 'About Updated!','alert-type'=>'success' );
            return redirect()->back()->with($notification);
        }

        
    }

    //about delete method
    public function destroy($id)
    {
        $data=About::findOrfail($id);
          if($image=$data->about_thumbnail) {
            unlink($image);
          }
          $data->delete();
          return response()->json('About Deleted!');

    }




}
