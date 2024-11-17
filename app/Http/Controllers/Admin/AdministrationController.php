<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;
use Illuminate\Support\Str;
use App\Models\Administration;

class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //administration index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=Administration::latest()->get();

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
                            <a href="'.route('ad.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.administration.index');
    }

    //administration store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|unique:administrations|max:55',
        'photo' => 'mimes:jpg,jpeg,bmp,svg,png|max:5000',
        ]);

        $slug=Str::slug($request->name, '-');

        $data=array();
        $data['name']=$request->name;
        $data['slug']=Str::slug($request->name, '-');
        $data['designation']=$request->designation;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['office']=$request->office;
        $data['degree']=$request->degree;
        $data['experience']=$request->experience;
        $data['contact']=$request->contact;
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['linkedin']=$request->linkedin;
        $data['youtube']=$request->youtube;
        $data['joining_date']=$request->joining_date;
        $data['status']=$request->status;

        if ($request->file('photo')) {
            //working with image
            $photo=$request->photo;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(489,499)->save('public/files/administration/'.$photoname);
          $data['photo']='public/files/administration/'.$photoname;
        }

        DB::table('administrations')->insert($data);

        $notification=array('message' => 'Employee Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);

    }

    //administration edit method
    public function edit($id)
    {
        $data=Administration::findOrfail($id);
        return view('admin.administration.edit',compact('data'));
    }

    //administration update method
    public function update(Request $request)
    {
        $slug=Str::slug($request->name, '-');
        
        $data=array();
        $data['name']=$request->name;
        $data['slug']=Str::slug($request->name, '-');
        $data['designation']=$request->designation;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['office']=$request->office;
        $data['degree']=$request->degree;
        $data['experience']=$request->experience;
        $data['contact']=$request->contact;
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['linkedin']=$request->linkedin;
        $data['youtube']=$request->youtube;
        $data['joining_date']=$request->joining_date;
        $data['status']=$request->status;

        if ($request->file('photo')) {
            if (File::exists($request->old_photo)){
              unlink($request->old_photo);
            }
            $photo=$request->photo;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(489,499)->save('public/files/administration/'.$photoname);
          $data['photo']='public/files/administration/'.$photoname;
          DB::table('administrations')->where('id',$request->id)->update($data);
        }else{
            $data['photo']=$request->old_photo;
            DB::table('administrations')->where('id',$request->id)->update($data);
        }

        $notification=array('message' => 'Employee Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //administration destroy method
    public function destroy($id)
    {
        $data=Administration::findOrfail($id);
          if($image=$data->photo) {
            unlink($image);
          }
          
          $data->delete();

        return response()->json('Employee Deleted!');
    }


}
