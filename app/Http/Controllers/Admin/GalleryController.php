<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;
use App\Models\Video;
use App\Models\Photo;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //video gallery index method
    public function videoindex(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('videos')->latest()->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function($row){
                        if ($row->status==1) {
                            return '<span class="badge badge-success">Active</span>';
                            }else {
                              return '<a href="#"><span class="badge badge-danger">Inactive</span> </a>';
                            }
                        })
                    ->addColumn('action',function($row){

                        $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                            <a href="'.route('video.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.gallery.video.index');
    }

    //video gallery store method
    public function videostore(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|unique:videos',
        
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
        $data['embed_code']=$request->embed_code;
        $data['status']=$request->status;
        $data['date']=date('d-m-Y');
        $data['month']=date('F');
        $data['year']=date('Y');

        if ($request->file('video_thumbnail')) {
            $photo=$request->video_thumbnail;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(1348,650)->save('public/files/gallery/'.$photoname);
          $data['video_thumbnail']='public/files/gallery/'.$photoname;
        }

        DB::table('videos')->insert($data);

        $notification=array('message' => 'Video Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification); 
    }

    //video gallery edit method
    public function videoedit($id)
    {
        $data=DB::table('videos')->where('id',$id)->first();
        return view('admin.gallery.video.edit',compact('data'));
    }

    //video gallery update method
    public function videoupdate(Request $request)
    {
        $data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
        $data['embed_code']=$request->embed_code;
        $data['status']=$request->status;
        $data['date']=date('d-m-Y');
        $data['month']=date('F');
        $data['year']=date('Y');

        if ($request->video_thumbnail){
            if (File::exists($request->old_thumbnail)){
              unlink($request->old_thumbnail);
            }
            $photo=$request->video_thumbnail;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(1348,650)->save('public/files/gallery/'.$photoname); 
            $data['video_thumbnail']='public/files/gallery/'.$photoname;
            DB::table('videos')->where('id',$request->id)->update($data);
        }else{
            $data['video_thumbnail']=$request->old_thumbnail;
            DB::table('videos')->where('id',$request->id)->update($data);
        }

        $notification=array('message' => 'Video Updated!','alert-type'=>'info' );
            return redirect()->back()->with($notification);
 
    }

    //video gallery delete method
    public function videodestroy($id)
    {
        $data=DB::table('videos')->where('id',$id)->first();
        if($image=$data->video_thumbnail) {
            unlink($image);
        }
        DB::table('videos')->where('id',$id)->delete();
        return response()->json('Video Deleted!'); 
    }


        














}
