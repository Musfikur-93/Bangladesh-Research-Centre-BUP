<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;
use App\Models\Member;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //member index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('members')->latest()->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function($row){
                        if ($row->status==1) {
                            return '<span class="badge badge-success">Active</span>';
                            }else {
                              return '<span class="badge badge-danger">Deactive</span></a>';
                            }
                        })
                    ->editColumn('steering_committee', function($row){
                        if ($row->steering_committee==1) {
                            return '<span class="badge badge-success">Active</span>';
                            }else {
                              return '<span class="badge badge-danger">Deactive</span></a>';
                            }
                        })
                    ->editColumn('finance_committee', function($row){
                        if ($row->finance_committee==1) {
                            return '<span class="badge badge-success">Active</span>';
                            }else {
                              return '<span class="badge badge-danger">Deactive</span></a>';
                            }
                        })
                    ->editColumn('syndicate_committee', function($row){
                        if ($row->syndicate_committee==1) {
                            return '<span class="badge badge-success">Active</span>';
                            }else {
                              return '<span class="badge badge-danger">Deactive</span></a>';
                            }
                        })
                    ->editColumn('seneate_committee', function($row){
                        if ($row->seneate_committee==1) {
                            return '<span class="badge badge-success">Active</span>';
                            }else {
                              return '<span class="badge badge-danger">Deactive</span></a>';
                            }
                        })
                    ->editColumn('academic_councile', function($row){
                        if ($row->academic_councile==1) {
                            return '<span class="badge badge-success">Active</span>';
                            }else {
                              return '<span class="badge badge-danger">Deactive</span></a>';
                            }
                        })                    
                    ->addColumn('action',function($row){

                        $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                            <a href="'.route('member.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status','steering_committee','finance_committee','syndicate_committee','seneate_committee','academic_councile'])
                    ->make(true);
            }

        return view('admin.member.index');
    }

    //member store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'm_thumbnial' => 'mimes:jpg,jpeg,bmp,svg,png|max:2000',
        ]);

        $data=array();
        $data['m_name']=$request->m_name;
        $data['m_title']=$request->m_title;
        $data['m_designation']=$request->m_designation;
        $data['steering_committee']=$request->steering_committee;
        $data['finance_committee']=$request->finance_committee;
        $data['syndicate_committee']=$request->syndicate_committee;
        $data['seneate_committee']=$request->seneate_committee;
        $data['academic_councile']=$request->academic_councile;
        $data['status']=$request->status;

        if ($request->file('m_thumbnial')) {
            //working with image
            $photo=$request->m_thumbnial;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(70,70)->save('public/files/member/'.$photoname);
          $data['m_thumbnial']='public/files/member/'.$photoname;
        }

        DB::table('members')->insert($data);

        $notification=array('message' => 'Member Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //member edit method
    public function edit($id)
    {
        $data=DB::table('members')->where('id',$id)->first();
        return view('admin.member.edit',compact('data'));
    }

    //member update method
    public function update(Request $request)
    {
        $data=array();
        $data['m_name']=$request->m_name;
        $data['m_title']=$request->m_title;
        $data['m_designation']=$request->m_designation;
        $data['steering_committee']=$request->steering_committee;
        $data['finance_committee']=$request->finance_committee;
        $data['syndicate_committee']=$request->syndicate_committee;
        $data['seneate_committee']=$request->seneate_committee;
        $data['academic_councile']=$request->academic_councile;
        $data['status']=$request->status;

        if ($request->file('m_thumbnial')) {
            if (File::exists($request->old_thumbnial)){
              unlink($request->old_thumbnial);
            }
            $photo=$request->m_thumbnial;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(70,70)->save('public/files/member/'.$photoname);
          $data['m_thumbnial']='public/files/member/'.$photoname;
          DB::table('members')->where('id',$request->id)->update($data);
        }else{
            $data['m_thumbnial']=$request->old_thumbnial;
            DB::table('members')->where('id',$request->id)->update($data);
        }

        $notification=array('message' => 'Member Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //member destroy method
    public function destroy($id)
    {
        $data=Member::findOrfail($id);
          if($thumbnail=$data->m_thumbnial) {
            unlink($thumbnail);
          }
          $data->delete();

        return response()->json('Member Deleted!');
    }



}
