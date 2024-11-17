<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;

class EboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //eboard index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('eboards')->latest()->get();

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
                            <a href="'.route('board.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        $pub=DB::table('publications')->get();

        return view('admin.eboard.index',compact('pub'));
    }

    //eboard store method
    public function store(Request $request)
    {

        $data=array();
        $data['title']=$request->title;
        $data['publication_id']=$request->publication_id;
        $data['eboard_name']=$request->eboard_name;
        $data['eboard_desig']=$request->eboard_desig;
        $data['eboard_dept']=$request->eboard_dept;
        $data['eboard_inst']=$request->eboard_inst;
        $data['status']=$request->status;

        DB::table('eboards')->insert($data);

        $notification=array('message' => 'Editor Board Member Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //eboard edit method
    public function edit($id)
    {
        $data=DB::table('eboards')->where('id',$id)->first();
        $pub=DB::table('publications')->get();
         return view('admin.eboard.edit',compact('data','pub'));
    }

    //eboard update method
    public function update(Request $request)
    {
        $data['title']=$request->title;
        $data['publication_id']=$request->publication_id;
        $data['eboard_name']=$request->eboard_name;
        $data['eboard_desig']=$request->eboard_desig;
        $data['eboard_dept']=$request->eboard_dept;
        $data['eboard_inst']=$request->eboard_inst;
        $data['status']=$request->status;

        DB::table('eboards')->where('id',$request->id)->update($data);

        $notification=array('message' => 'Editor Board Member Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //eboard destroy method
    public function destroy($id)
    {
        $data=DB::table('eboards')->where('id',$id)->first();
        DB::table('eboards')->where('id',$id)->delete();

        return response()->json('Editorial Board Member Deleted!');
    }





}
