<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;
use App\Models\Speaker;

class SpeakerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //speaker index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('speakers')->latest()->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function($row){
                        if ($row->status==1) {
                            return '<span class="badge badge-success">Active</span>';
                            }else {
                              return '<span class="badge badge-danger">Deactive</span></a>';
                            }
                        })                    
                    ->addColumn('action',function($row){

                        $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                            <a href="'.route('speaker.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.event.speaker.index');
    }

    //speaker store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'speaker_name' => 'required|unique:speakers|max:55',
        'speaker_img' => 'mimes:jpg,jpeg,bmp,svg,png|max:5000',
        ]);

        $data=array();
        $data['speaker_name']=$request->speaker_name;
        $data['speaker_desig']=$request->speaker_desig;
        $data['speaker_organization']=$request->speaker_organization;
        $data['speaker_type']=$request->speaker_type;
        $data['status']=$request->status;

        if ($request->file('speaker_img')) {
            //working with image
            $photo=$request->speaker_img;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(89,46)->save('public/files/event/'.$photoname); //image intervention
          $data['speaker_img']='public/files/event/'.$photoname; //public/files/slider/plus-point.jpg
        }

        DB::table('speakers')->insert($data);

          $notification=array('message' => 'Speaker Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //speaker edit method
    public function edit($id)
    {
        $data=DB::table('speakers')->where('id',$id)->first();
        return view('admin.event.speaker.edit',compact('data'));
    }

    //speaker update method
    public function update(Request $request)
    {
        $data=array();
        $data['speaker_name']=$request->speaker_name;
        $data['speaker_desig']=$request->speaker_desig;
        $data['speaker_organization']=$request->speaker_organization;
        $data['speaker_type']=$request->speaker_type;
        $data['status']=$request->status;

        if ($request->file('speaker_img')) {
           if (File::exists($request->old_img)){
              unlink($request->old_img);
            }
            $photo=$request->speaker_img;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(89,46)->save('public/files/event/'.$photoname);
          $data['speaker_img']='public/files/event/'.$photoname; 
          DB::table('speakers')->where('id',$request->id)->update($data);
        }else{
            $data['speaker_img']=$request->old_img;
            DB::table('speakers')->where('id',$request->id)->update($data);

            $notification=array('message' => 'Slider Updated!','alert-type'=>'info' );
            return redirect()->back()->with($notification);
        }

    }

    //speaker destroy method
    public function destroy($id)
    {
        $data=Speaker::findOrfail($id);
          if($image=$data->speaker_img) {
            unlink($image);
          }
          $data->delete();

        return response()->json('Speaker Deleted');
    }




}
