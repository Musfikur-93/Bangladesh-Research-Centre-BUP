<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;
use App\Models\Cpmess;

class CpmessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //cp message index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('cpmessage')->latest()->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    
                    ->addColumn('action',function($row){

                        $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                            <a href="'.route('cp.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

        return view('admin.cpmessage.index');
    }

    //cp message store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'cp_title' => 'required|unique:cpmessage|max:55',
        'cp_image' => 'mimes:jpg,jpeg,bmp,svg,png|max:5000',
        ]);

        $data=array();
        $data['cp_title']=$request->cp_title;
        $data['cp_message']=$request->cp_message;
        $data['cp_regards']=$request->cp_regards;
        $data['cp_name']=$request->cp_name;
        $data['cp_designation']=$request->cp_designation;
        $data['cp_organization']=$request->cp_organization;

        if ($request->file('cp_image')) {
            $photo=$request->cp_image;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(350,200)->save('public/files/cpmessage/'.$photoname);
          $data['cp_image']='public/files/cpmessage/'.$photoname;
        }

        DB::table('cpmessage')->insert($data);

        $notification=array('message' => 'Message Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //cp message edit method
    public function edit($id)
    {
        $data=DB::table('cpmessage')->where('id',$id)->first();
        return view('admin.cpmessage.edit',compact('data'));
    }

    //cp message update method
    public function update(Request $request)
    {
        $data=array();
        $data['cp_title']=$request->cp_title;
        $data['cp_message']=$request->cp_message;
        $data['cp_regards']=$request->cp_regards;
        $data['cp_name']=$request->cp_name;
        $data['cp_designation']=$request->cp_designation;
        $data['cp_organization']=$request->cp_organization;

        if ($request->file('cp_image')) {
            if (File::exists($request->old_img)){
              unlink($request->old_img);
            }
            $photo=$request->cp_image;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(350,200)->save('public/files/cpmessage/'.$photoname);
          $data['cp_image']='public/files/cpmessage/'.$photoname;
          DB::table('cpmessage')->where('id',$request->id)->update($data);

          $notification=array('message' => 'Message Updated!','alert-type'=>'success' );
            return redirect()->back()->with($notification);

        }else{
            $data['cp_image']=$request->old_img;
            DB::table('cpmessage')->where('id',$request->id)->update($data);

            $notification=array('message' => 'Message Updated!','alert-type'=>'success' );
                return redirect()->back()->with($notification);
        }

    }

    //cp message delete method
    public function destroy($id)
    {
        $data=DB::table('cpmessage')->where('id',$id)->first();
          if($image=$data->cp_image) {
            unlink($image);
          }
          DB::table('cpmessage')->where('id',$id)->delete();

        return response()->json('Message Deleted!');
    }



}
