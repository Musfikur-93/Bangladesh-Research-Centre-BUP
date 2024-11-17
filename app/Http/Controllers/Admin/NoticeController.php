<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;
use Illuminate\Support\Str;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //notice index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=Notice::latest()->get();

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
                            <a href="'.route('notice.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.notice.index');
    }

    //notice store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|unique:notices',
        'notice_file' => 'required|mimes:pdf,doc,docx|max:5000',
        'notice_thumbnail' => 'sometimes|mimes:jpg,jpeg,png,svg|max:2000',
        ]);

        $slug=Str::slug($request->title, '-');

        $data=array();
        $data['title']=$request->title;
        $data['notice_slug']=Str::slug($request->title, '-');
        $data['description']=$request->description;
        $data['date']=date('d-m-Y');
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status']=$request->status;

        if ($request->file('notice_thumbnail')) {
            //working with image
            $photo=$request->notice_thumbnail;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(1348,650)->save('public/files/notice/'.$photoname); //image intervention
          $data['notice_thumbnail']='public/files/notice/'.$photoname; //public/files/slider/plus-point.jpg
        }

        if ($request->file('notice_file')) {
            $document=$request->notice_file;
            $documentname=$slug.'.'.$document->getClientOriginalExtension();
            $document->move('public/files/notice/',$documentname);
          $data['notice_file']=$documentname; 
        }

          DB::table('notices')->insert($data);

          $notification=array('message' => 'Notice Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //notice edit method
    public function edit($id)
    {
        $data=DB::table('notices')->where('id',$id)->first();
            return view('admin.notice.edit',compact('data'));
    }

    //notice update method
    public function update(Request $request)
    {
        $slug=Str::slug($request->title, '-');

        $data=array();
        $data['title']=$request->title;
        $data['notice_slug']=Str::slug($request->title, '-');
        $data['description']=$request->description;
        $data['date']=date('d-m-Y');
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status']=$request->status;

        if($request->file('notice_thumbnail')){
            if(File::exists($request->old_thumbnail)){
              unlink($request->old_thumbnail);
            }
            $photo=$request->notice_thumbnail;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(1348,650)->save('public/files/notice/'.$photoname); 
          $data['notice_thumbnail']='public/files/notice/'.$photoname;
          DB::table('notices')->where('id',$request->id)->update($data);

        }else{
            $data['notice_thumbnail']=$request->old_thumbnail;
            DB::table('notices')->where('id',$request->id)->update($data);
        }

        if ($request->file('notice_file')) {
            if (File::exists($request->old_notice)){
              file::delete($request->old_notice);
            }
            $document=$request->notice_file;
            $documentname=$slug.'.'.$document->getClientOriginalExtension();
            $document->move('public/files/notice/',$documentname); 
          $data['notice_file']=$documentname; 
          DB::table('notices')->where('id',$request->id)->update($data);

        }else{
            $data['notice_file']=$request->old_notice;
            DB::table('notices')->where('id',$request->id)->update($data);
        }

        $notification=array('message' => 'Notice Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);

    }

    //notice destroy method
    public function destroy($id)
    {
        $data=Notice::findOrfail($id);
          if($image=$data->notice_thumbnail) {
            unlink($image);
          }
          if($file=$data->notice_file) {
            File::delete('public/files/notice/'.$file);
          }
          $data->delete();

        $notification=array('message' => 'Notice Deleted!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
    }




}
