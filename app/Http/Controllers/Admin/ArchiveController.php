<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Archive;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //archive index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=Archive::latest()->get();

            return DataTables::of($data)
                    ->addIndexColumn()                   
                    ->addColumn('action',function($row){
                        $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                            <a href="'.route('archive.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
         $pub=DB::table('publications')->get();

        return view('admin.archive.index',compact('pub'));
    }

    //archive store method
    public function store(Request $request)
    {
       

        $data=array();
        $data['title']=$request->title;
        $data['publication_id']=$request->publication_id;
        $data['date']=date('d-m-Y');
        $data['month']=date('F');
        $data['year']=date('Y');

        DB::table('archives')->insert($data);

        $notification=array('message' => 'Archive Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //archive edit method
    public function edit($id)
    {
        $data=DB::table('archives')->where('id',$id)->first();
        $pub=DB::table('publications')->get();
        return view('admin.archive.edit',compact('data','pub'));
    }

    //archive update method
    public function update(Request $request)
    {
        $data=array();
        $data['title']=$request->title;
        $data['publication_id']=$request->publication_id;
        $data['date']=date('d-m-Y');
        $data['month']=date('F');
        $data['year']=date('Y');

        DB::table('archives')->where('id',$request->id)->update($data);

        $notification=array('message' => 'Archive Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //archive destroy method
    public function destroy($id)
    {
        $data=Archive::findOrfail($id);
          
          $data->delete();

        return response()->json('Archive Deleted!');
    }



}
