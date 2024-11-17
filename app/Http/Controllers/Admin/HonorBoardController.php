<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;
use Illuminate\Support\Str;

class HonorBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //honor board create method
    public function create()
    {
        return view('admin.honor.create');
    }

    //honor board create method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('honorboards')->latest()->get();

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

                        $actionbtn='<a href="'.route('honor.edit',[$row->id]).'" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="'.route('honor.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.honor.index');
    }

    //honor board store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'hb_name' => 'required|unique:honorboards',
        'hb_image' => 'mimes:jpg,jpeg,bmp,svg,png|max:5000',
        'hb_profile' => 'mimes:pdf,doc,docx|max:5000',
        ]);

        $slug=Str::slug($request->hb_name, '-');

        $data=array();
        $data['hb_name']=$request->hb_name;
        $data['slug']=Str::slug($request->hb_name, '-');
        $data['hb_designation']=$request->hb_designation;
        $data['hb_joining']=$request->hb_joining;
        $data['hb_month']=date('F');
        $data['hb_year']=date('Y');
        $data['status']=$request->status;

        if ($request->file('hb_image')) {
            //working with image
            $photo=$request->hb_image;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(300,300)->save('public/files/honor/'.$photoname);
          $data['hb_image']='public/files/honor/'.$photoname;
        }

        if ($request->file('hb_profile')) {
            $document=$request->hb_profile;
            $documentname=$slug.'.'.$document->getClientOriginalExtension();
            $document->move('public/files/honor/',$documentname);
          $data['hb_profile']=$documentname; 
        }

        DB::table('honorboards')->insert($data);

        $notification=array('message' => 'Honor Member Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //honor board edit method
    public function edit($id)
    {
        $data=DB::table('honorboards')->where('id',$id)->first();
            return view('admin.honor.edit',compact('data'));
    }

    //honor board update method
    public function update(Request $request)
    {
        $slug=Str::slug($request->hb_name, '-');

        $data=array();
        $data['hb_name']=$request->hb_name;
        $data['slug']=Str::slug($request->hb_name, '-');
        $data['hb_designation']=$request->hb_designation;
        $data['hb_joining']=$request->hb_joining;
        $data['hb_month']=date('F');
        $data['hb_year']=date('Y');
        $data['status']=$request->status;

        if ($request->file('hb_image')) {
            if(File::exists($request->old_image)){
              unlink($request->old_image);
            }
            $photo=$request->hb_image;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(300,300)->save('public/files/honor/'.$photoname);
          $data['hb_image']='public/files/honor/'.$photoname;
          DB::table('honorboards')->where('id',$request->id)->update($data);
        }else{
            $data['hb_image']=$request->old_image;
            DB::table('honorboards')->where('id',$request->id)->update($data);
        }

        if ($request->file('hb_profile')) {
            if($request->old_profile){
              file::delete($request->old_profile);
            }
            $document=$request->hb_profile;
            $documentname=$slug.'.'.$document->getClientOriginalExtension();
            $document->move('public/files/honor/',$documentname);
          $data['hb_profile']=$documentname;
          DB::table('honorboards')->where('id',$request->id)->update($data); 
        }else{
            $data['hb_profile']=$request->old_profile;
            DB::table('honorboards')->where('id',$request->id)->update($data);
        }

        $notification=array('message' => 'Honor Board Member Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //honor board destroy method
    public function destroy($id)
    {
        $data=DB::table('honorboards')->where('id',$id)->first();
          if($image=$data->hb_image) {
            unlink($image);
          }
          if($file=$data->hb_profile) {
            File::delete('public/files/honor/'.$file);
          }
          DB::table('honorboards')->where('id',$id)->delete();

        $notification=array('message' => 'Honor Member Deleted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }





}
