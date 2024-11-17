<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;
use App\Models\Publication;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //publication create method
    public function create()
    {
        return view('admin.publication.create');
    }

    //publication index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('publications')->latest()->get();

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

                        $actionbtn='<a href="'.route('publication.edit',[$row->id]).'" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="'.route('publication.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.publication.index');
    }

    //publication store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'publication_name' => 'required|unique:publications|max:100',
        'publication_image' => 'required|mimes:jpg,jpeg,bmp,svg,png|max:5000',
        'publication_file' => 'mimes:pdf,doc,docx|max:30000',
        ]);

        $slug=Str::slug($request->publication_name, '-');

        $data=array();
        $data['publication_name']=$request->publication_name;
        $data['publication_slug']=Str::slug($request->publication_name, '-');
        $data['chiefpatron_title']=$request->chiefpatron_title;
        $data['chiefpatron_message']=$request->chiefpatron_message;
        $data['chiefpatron_name']=$request->chiefpatron_name;
        $data['chiefpatron_desig']=$request->chiefpatron_desig;
        $data['chiefpatron_dept']=$request->chiefpatron_dept;
        $data['chiefpatron_inst']=$request->chiefpatron_inst;
        $data['chipatron_name']=$request->chipatron_name;
        $data['chipatron_desig']=$request->chipatron_desig;
        $data['chipatron_dept']=$request->chipatron_dept;
        $data['chipatron_inst']=$request->chipatron_inst;
        $data['patron_name']=$request->patron_name;
        $data['patron_desig']=$request->patron_desig;
        $data['patron_dept']=$request->patron_dept;
        $data['patron_inst']=$request->patron_inst;
        $data['editor_title']=$request->editor_title;
        $data['editor_note']=$request->editor_note;
        $data['editor_name']=$request->editor_name;
        $data['editor_desig']=$request->editor_desig;
        $data['editor_dept']=$request->editor_dept;
        $data['editor_inst']=$request->editor_inst;
        $data['chiefeditor_name']=$request->chiefeditor_name;
        $data['chiefeditor_desig']=$request->chiefeditor_desig;
        $data['chiefeditor_dept']=$request->chiefeditor_dept;
        $data['chiefeditor_inst']=$request->chiefeditor_inst;
        $data['issue_date']=date('d-m-Y');
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status']=$request->status;

        if ($request->file('publication_image')) {
            //working with image
            $photo=$request->publication_image;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(370,320)->save('public/files/publication/'.$photoname);
          $data['publication_image']='public/files/publication/'.$photoname;
        }

        if ($request->file('publication_file')) {
            $document=$request->publication_file;
            $documentname=$slug.'.'.$document->getClientOriginalExtension();
            $document->move('public/files/publication/',$documentname);
          $data['publication_file']=$documentname; 
        }

        DB::table('publications')->insert($data);

        $notification=array('message' => 'Publication Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //publication edit method
    public function edit($id)
    {
        $data=DB::table('publications')->where('id',$id)->first();
        return view('admin.publication.edit',compact('data'));
    }

    //publication update method
    public function update(Request $request)
    {
        $slug=Str::slug($request->publication_name, '-');

        $data=array();
        $data['publication_name']=$request->publication_name;
        $data['publication_slug']=Str::slug($request->publication_name, '-');
        $data['chiefpatron_title']=$request->chiefpatron_title;
        $data['chiefpatron_message']=$request->chiefpatron_message;
        $data['chiefpatron_name']=$request->chiefpatron_name;
        $data['chiefpatron_desig']=$request->chiefpatron_desig;
        $data['chiefpatron_dept']=$request->chiefpatron_dept;
        $data['chiefpatron_inst']=$request->chiefpatron_inst;
        $data['chipatron_name']=$request->chipatron_name;
        $data['chipatron_desig']=$request->chipatron_desig;
        $data['chipatron_dept']=$request->chipatron_dept;
        $data['chipatron_inst']=$request->chipatron_inst;
        $data['patron_name']=$request->patron_name;
        $data['patron_desig']=$request->patron_desig;
        $data['patron_dept']=$request->patron_dept;
        $data['patron_inst']=$request->patron_inst;
        $data['editor_title']=$request->editor_title;
        $data['editor_note']=$request->editor_note;
        $data['editor_name']=$request->editor_name;
        $data['editor_desig']=$request->editor_desig;
        $data['editor_dept']=$request->editor_dept;
        $data['editor_inst']=$request->editor_inst;
        $data['chiefeditor_name']=$request->chiefeditor_name;
        $data['chiefeditor_desig']=$request->chiefeditor_desig;
        $data['chiefeditor_dept']=$request->chiefeditor_dept;
        $data['chiefeditor_inst']=$request->chiefeditor_inst;
        $data['issue_date']=date('d-m-Y');
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status']=$request->status;

        if ($request->file('publication_image')) {
            if(File::exists($request->old_image)){
              unlink($request->old_image);
            }
            $photo=$request->publication_image;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(370,320)->save('public/files/publication/'.$photoname);
          $data['publication_image']='public/files/publication/'.$photoname;
          DB::table('publications')->where('id',$request->id)->update($data);
        }else{
            $data['publication_image']=$request->old_image;
            DB::table('publications')->where('id',$request->id)->update($data);
        }

        if ($request->file('publication_file')) {
            if (File::exists($request->old_file)){
              file::delete($request->old_file);
            }
            $document=$request->publication_file;
            $documentname=$slug.'.'.$document->getClientOriginalExtension();
            $document->move('public/files/publication/',$documentname);
          $data['publication_file']=$documentname;
          DB::table('publications')->where('id',$request->id)->update($data); 
        }else{
            $data['publication_file']=$request->old_file;
            DB::table('publications')->where('id',$request->id)->update($data);
        }

        $notification=array('message' => 'Publication Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);

    }

    //publication destroy method
    public function destroy($id)
    {
        $data=Publication::findOrfail($id);
          if($image=$data->publication_image) {
            unlink($image);
          }
          if($file=$data->publication_file) {
            File::delete('public/files/publication/'.$file);
          }
          $data->delete();

        $notification=array('message' => 'Publication Deleted!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
    }





}
