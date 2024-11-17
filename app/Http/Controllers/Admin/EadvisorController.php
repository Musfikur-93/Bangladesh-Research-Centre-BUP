<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Eadvisor;

class EadvisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //eadvisor index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('eadvisors')->latest()->get();

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
                            <a href="'.route('advisor.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        $pub=DB::table('publications')->get();

        return view('admin.eadvisor.index',compact('pub'));
    }

    //advisor store method
    public function store(Request $request)
    {
    
        $data=array();
        $data['title']=$request->title;
        $data['publication_id']=$request->publication_id;
        $data['eadvisor_name']=$request->eadvisor_name;
        $data['eadvisor_desig']=$request->eadvisor_desig;
        $data['eadvisor_dept']=$request->eadvisor_dept;
        $data['eadvisor_inst']=$request->eadvisor_inst;
        $data['status']=$request->status;

        DB::table('eadvisors')->insert($data);

        $notification=array('message' => 'Advisor Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //advisor edit method
    public function edit($id)
    {
        $data=DB::table('eadvisors')->where('id',$id)->first();
        $pub=DB::table('publications')->get();
         return view('admin.eadvisor.edit',compact('data','pub'));
    }

    //advisor update method
    public function update(Request $request)
    {
        $data['title']=$request->title;
        $data['publication_id']=$request->publication_id;
        $data['eadvisor_name']=$request->eadvisor_name;
        $data['eadvisor_desig']=$request->eadvisor_desig;
        $data['eadvisor_dept']=$request->eadvisor_dept;
        $data['eadvisor_inst']=$request->eadvisor_inst;
        $data['status']=$request->status;


        DB::table('eadvisors')->where('id',$request->id)->update($data);

        $notification=array('message' => 'Advisor Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //advisor destroy method
    public function destroy($id)
    {
        $data=Eadvisor::findOrfail($id);
          $data->delete();

        return response()->json('Advisor Deleted!');
    }



}
