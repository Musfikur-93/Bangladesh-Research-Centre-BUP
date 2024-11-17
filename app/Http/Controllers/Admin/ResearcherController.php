<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;
use App\Models\Crs;
use Illuminate\Support\Str;

class ResearcherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //professor's create method
    public function create()
    {
        return view('admin.professor.create');
    }

    //professor's index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=Crs::latest()->get();

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

                        $actionbtn='<a href="'.route('professor.edit',[$row->id]).'" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="'.route('professor.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.professor.index');
    }

    //professor's store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'cr_name' => 'required|unique:crs',
        'cr_image' => 'mimes:jpg,jpeg,bmp,svg,png|max:5000',
        'cr_profile' => 'mimes:pdf,doc,docx|max:5000',
        ]);

        $slug=Str::slug($request->cr_name, '-');

        $data=array();
        $data['cr_name']=$request->cr_name;
        $data['slug']=Str::slug($request->cr_name, '-');
        $data['cr_designation']=$request->cr_designation;
        $data['cr_atitle']=$request->cr_atitle;
        $data['cr_amessage']=$request->cr_amessage;
        $data['cr_degree']=$request->cr_degree;
        $data['cr_experience']=$request->cr_experience;
        $data['cr_dept']=$request->cr_dept;
        $data['cr_ctitle']=$request->cr_ctitle;
        $data['cr_email']=$request->cr_email;
        $data['cr_phone']=$request->cr_phone;
        $data['cr_facebook']=$request->cr_facebook;
        $data['cr_twitter']=$request->cr_twitter;
        $data['cr_linkedin']=$request->cr_linkedin;
        $data['cr_instagram']=$request->cr_instagram;
        $data['cr_youtube']=$request->cr_youtube;
        $data['cr_stitle']=$request->cr_stitle;
        $data['cr_slanguage']=$request->cr_slanguage;
        $data['cr_steam']=$request->cr_steam;
        $data['cr_sdevelopment']=$request->cr_sdevelopment;
        $data['cr_sdesign']=$request->cr_sdesign;
        $data['cr_sinnovation']=$request->cr_sinnovation;
        $data['cr_scommunication']=$request->cr_scommunication;
        $data['cr_joining']=$request->cr_joining;
        $data['cr_month']=date('F');
        $data['cr_year']=date('Y');
        $data['status']=$request->status;

        if ($request->file('cr_image')) {
            //working with image
            $photo=$request->cr_image;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(489,499)->save('public/files/professor/'.$photoname);
          $data['cr_image']='public/files/professor/'.$photoname;
        }

        if ($request->file('cr_profile')) {
            $document=$request->cr_profile;
            $documentname=$slug.'.'.$document->getClientOriginalExtension();
            $document->move('public/files/professor/',$documentname);
          $data['cr_profile']=$documentname; 
        }

        DB::table('crs')->insert($data);

        $notification=array('message' => 'Researcher Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //professor's edit method
    public function edit($id)
    {
        $data=DB::table('crs')->where('id',$id)->first();
            return view('admin.professor.edit',compact('data'));
    }

    //professor's update method
    public function update(Request $request)
    {
        $slug=Str::slug($request->cr_name, '-');

        $data=array();
        $data['cr_name']=$request->cr_name;
        $data['slug']=Str::slug($request->cr_name, '-');
        $data['cr_designation']=$request->cr_designation;
        $data['cr_atitle']=$request->cr_atitle;
        $data['cr_amessage']=$request->cr_amessage;
        $data['cr_degree']=$request->cr_degree;
        $data['cr_experience']=$request->cr_experience;
        $data['cr_dept']=$request->cr_dept;
        $data['cr_ctitle']=$request->cr_ctitle;
        $data['cr_email']=$request->cr_email;
        $data['cr_phone']=$request->cr_phone;
        $data['cr_facebook']=$request->cr_facebook;
        $data['cr_twitter']=$request->cr_twitter;
        $data['cr_linkedin']=$request->cr_linkedin;
        $data['cr_instagram']=$request->cr_instagram;
        $data['cr_youtube']=$request->cr_youtube;
        $data['cr_stitle']=$request->cr_stitle;
        $data['cr_slanguage']=$request->cr_slanguage;
        $data['cr_steam']=$request->cr_steam;
        $data['cr_sdevelopment']=$request->cr_sdevelopment;
        $data['cr_sdesign']=$request->cr_sdesign;
        $data['cr_sinnovation']=$request->cr_sinnovation;
        $data['cr_scommunication']=$request->cr_scommunication;
        $data['cr_joining']=$request->cr_joining;
        $data['cr_month']=date('F');
        $data['cr_year']=date('Y');
        $data['status']=$request->status;

        if ($request->file('cr_image')) {
            if(File::exists($request->old_image)){
              unlink($request->old_image);
            }
            $photo=$request->cr_image;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(489,499)->save('public/files/professor/'.$photoname);
          $data['cr_image']='public/files/professor/'.$photoname;
          DB::table('crs')->where('id',$request->id)->update($data);
        }else{
            $data['cr_image']=$request->old_image;
            DB::table('crs')->where('id',$request->id)->update($data);
        }

        if ($request->file('cr_profile')) {
            if($request->old_profile){
              file::delete($request->old_profile);
            }
            $document=$request->cr_profile;
            $documentname=$slug.'.'.$document->getClientOriginalExtension();
            $document->move('public/files/professor/',$documentname);
          $data['cr_profile']=$documentname;
          DB::table('crs')->where('id',$request->id)->update($data); 
        }else{
            $data['cr_profile']=$request->old_profile;
            DB::table('crs')->where('id',$request->id)->update($data);
        }

        $notification=array('message' => 'Researcher Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //professor destroy method
    public function destroy($id)
    {
         $data=DB::table('crs')->where('id',$id)->first();
          if($image=$data->cr_image) {
            unlink($image);
          }
          if($file=$data->cr_profile) {
            File::delete('public/files/professor/'.$file);
          }
          DB::table('crs')->where('id',$id)->delete();

        $notification=array('message' => 'Researcher Deleted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }



}
