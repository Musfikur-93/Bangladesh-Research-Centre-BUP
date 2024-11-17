<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Author;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //author index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=Author::latest()->get();

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
                            <a href="'.route('author.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.author.index');
    }

    //author store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'author_name' => 'required|max:55',
        ]);

        $data=array();
        $data['author_name']=$request->author_name;
        $data['designation']=$request->designation;
        $data['department']=$request->department;
        $data['institute']=$request->institute;
        $data['status']=$request->status;

        DB::table('authors')->insert($data);

        $notification=array('message' => 'Author Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //author edit method
    public function edit($id)
    {
        $data=DB::table('authors')->where('id',$id)->first();
        return view('admin.author.edit',compact('data'));
    }

    //author update method
    public function update(Request $request)
    {
        $data=array();
        $data['author_name']=$request->author_name;
        $data['designation']=$request->designation;
        $data['department']=$request->department;
        $data['institute']=$request->institute;
        $data['status']=$request->status;

        DB::table('authors')->where('id',$request->id)->update($data);

        $notification=array('message' => 'Author Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //author destroy method
    public function destroy($id)
    {
        $data=Author::findOrfail($id);
        $data->delete();

        return response()->json('Author Deleted!');
    }



}
