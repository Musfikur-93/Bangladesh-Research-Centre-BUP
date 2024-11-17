<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Slider;
use Image;
use File;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //slider index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=Slider::latest()->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function($row){
                        if ($row->status==1) {
                            return '<span class="badge badge-success">Slider Show</span>';
                            }
                        })
                    ->addColumn('action',function($row){

                        $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                            <a href="'.route('slider.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.slider.index');
    }

    //slider store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'slider_img' => 'required|mimes:jpg,png,jpeg,gif|max:9000',
        ]);

        $data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
        $data['status']=$request->status;

        if ($request->file('slider_img')) {
            //working with image
            $photo=$request->slider_img;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            // $photo->move('public/files/brand/',$photoname); //without image intervention
            Image::make($photo)->resize(1920,720)->save('public/files/slider/'.$photoname); //image intervention
          $data['slider_img']='public/files/slider/'.$photoname; //public/files/slider/plus-point.jpg
        }

          DB::table('sliders')->insert($data);

          $notification=array('message' => 'Slider Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //slider edit method
    public function edit($id)
    {
        $data=Slider::findOrfail($id);
        return view('admin.slider.edit',compact('data'));
    }

    //slider update method
    public function update(Request $request)
    {
        $data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
        $data['status']=$request->status;

        if ($request->slider_img){
            if (File::exists($request->old_img)){
              unlink($request->old_img);
            }
            $photo=$request->slider_img;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(1920,720)->save('public/files/slider/'.$photoname); 
            $data['slider_img']='public/files/slider/'.$photoname;
            DB::table('sliders')->where('id',$request->id)->update($data);

            $notification=array('message' => 'Slider Updated!','alert-type'=>'success' );
            return redirect()->back()->with($notification);
        }else{
            $data['slider_img']=$request->old_img;
            DB::table('sliders')->where('id',$request->id)->update($data);

            $notification=array('message' => 'Slider Updated!','alert-type'=>'info' );
            return redirect()->back()->with($notification);
        }
 
    }

    //slider destroy method
    public function destroy($id)
    {
        $data=Slider::findOrfail($id);
          if($image=$data->slider_img) {
            unlink($image);
          }
          $data->delete();

        $notification=array('message' => 'Slider Deleted!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
    }


}
