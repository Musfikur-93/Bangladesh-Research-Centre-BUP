<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //event index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=DB::table('events')->latest()->get();

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
                            <a href="'.route('event.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.event.index');
    }

    //event store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'e_title' => 'required|unique:events',
        'e_thumbnail' => 'mimes:jpg,jpeg,bmp,svg,png|max:5000',
        'keynote_img' => 'mimes:jpg,jpeg,bmp,svg,png|max:5000',
        ]);

        $data=array();
        $data['e_title']=$request->e_title;
        $data['e_venue']=$request->e_venue;
        $data['e_des']=$request->e_des;
        $data['keynote_name']=$request->keynote_name;
        $data['keynote_desig']=$request->keynote_desig;
        $data['keynote_organization']=$request->keynote_organization;
        $data['keynote_type']=$request->keynote_type;
        $data['chief_name']=$request->chief_name;
        $data['chief_desig']=$request->chief_desig;
        $data['chief_organization']=$request->chief_organization;
        $data['chief_type']=$request->chief_type;
        $data['e_time']=$request->e_time;
        $data['date']=$request->date;
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status']=$request->status;

        if ($request->file('e_thumbnail')){
            $photo=$request->e_thumbnail;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(775,360)->save('public/files/event/'.$photoname);
          $data['e_thumbnail']='public/files/event/'.$photoname;

        }

        if ($request->file('keynote_img')) {
            $photo=$request->keynote_img;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(96,84)->save('public/files/event/'.$photoname);
          $data['keynote_img']='public/files/event/'.$photoname;
        }

        if ($request->file('chief_img')) {
            $photo=$request->chief_img;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(96,84)->save('public/files/event/'.$photoname);
          $data['chief_img']='public/files/event/'.$photoname;
        }

        DB::table('events')->insert($data);

        $notification=array('message' => 'Event Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //event edit method
    public function edit($id)
    {
        $data=DB::table('events')->where('id',$id)->first();
         return view('admin.event.edit',compact('data'));
    }

    //event update method
    public function update(Request $request)
    {
        $data=array();
        $data['e_title']=$request->e_title;
        $data['e_venue']=$request->e_venue;
        $data['e_des']=$request->e_des;
        $data['keynote_name']=$request->keynote_name;
        $data['keynote_desig']=$request->keynote_desig;
        $data['keynote_organization']=$request->keynote_organization;
        $data['keynote_type']=$request->keynote_type;
        $data['chief_name']=$request->chief_name;
        $data['chief_desig']=$request->chief_desig;
        $data['chief_organization']=$request->chief_organization;
        $data['chief_type']=$request->chief_type;
        $data['e_time']=$request->e_time;
        $data['date']=$request->date;
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status']=$request->status;

        if ($request->file('e_thumbnail')){
            if (File::exists($request->old_thumb)){
              unlink($request->old_thumb);
            }
            $photo=$request->e_thumbnail;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(775,360)->save('public/files/event/'.$photoname);
          $data['e_thumbnail']='public/files/event/'.$photoname;
          DB::table('events')->where('id',$request->id)->update($data);
        }else{
            $data['e_thumbnail']=$request->old_thumb;
            DB::table('events')->where('id',$request->id)->update($data);
        }

        if ($request->file('keynote_img')) {
            if (File::exists($request->old_img)){
              unlink($request->old_img);
            }
            $photo=$request->keynote_img;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(96,84)->save('public/files/event/'.$photoname);
          $data['keynote_img']='public/files/event/'.$photoname;
          DB::table('events')->where('id',$request->id)->update($data);
        }else{
            $data['keynote_img']=$request->old_img;
            DB::table('events')->where('id',$request->id)->update($data); 
        }

        if ($request->file('chief_img')) {
            if (File::exists($request->old_img_one)){
              unlink($request->old_img_one);
            }
            $photo=$request->chief_img;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(96,84)->save('public/files/event/'.$photoname);
          $data['chief_img']='public/files/event/'.$photoname;
          DB::table('events')->where('id',$request->id)->update($data);
        }else{
            $data['chief_img']=$request->old_img_one;
            DB::table('events')->where('id',$request->id)->update($data); 
        }

        $notification=array('message' => 'Event Updated!','alert-type'=>'success' );
          return redirect()->back()->with($notification);

    }

    //event delete method
    public function destroy($id)
    {
        $data=DB::table('events')->where('id',$id)->first();
          if($thumbnail=$data->e_thumbnail) {
            unlink($thumbnail);
          }
          if($image=$data->keynote_img) {
            unlink($image);
          }
          if($image_one=$data->chief_img) {
            unlink($image_one);
          }
          DB::table('events')->where('id',$id)->delete();

        return response()->json('Event Deleted!');
    }




}
