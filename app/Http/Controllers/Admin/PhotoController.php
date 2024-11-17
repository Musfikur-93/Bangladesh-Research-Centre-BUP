<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Image;
use Illuminate\Support\Str;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
      //photo manage/index method
      public function photoindex(Request $request)
      {
          if($request->ajax()){

            $data="";
                $query=DB::table('photos')->orderBy('id','DESC');

                if ($request->status==1) {
                     $query->where('status',1);
                    }

                if ($request->status==0) {
                    $query->where('status',0);
                    }

                if ($request->date) {
                     $photo_date=date('d-m-Y',strtotime($request->date));
                        $query->where('date',$photo_date);
                    }

            $data=$query->get();
            return DataTables::of($data)
                    ->addIndexColumn() 
                    ->editColumn('status', function($row){
                        if ($row->status==1) {
                          return '<a href="#" data-id="'.$row->id.'" class="deactive_status"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';
                         }else {
                          return '<a href="#" data-id="'.$row->id.'" class="active_status"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">deactive</span> </a>';
                                }
                            })
                    ->addColumn('action',function($row){

                        $actionbtn='<a href="'.route('photo.edit',[$row->id]).'" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="'.route('photo.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.gallery.photo.index');
      }
    
    public function photostore(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|unique:photos',
        'thumbnail' => 'mimes:jpg,jpeg,bmp,svg,png|max:5000',
        ]);
        $slug = Str::slug($request->title, '-');

        $data=array();
        $data['title']=$request->title;
        $data['slug']=$slug;
        $data['description']=$request->description;
        $data['status']=$request->status;
        $data['date']=date('d-m-Y');
        $data['month']=date('F');
        $data['year']=date('Y');

        //thumbnail
        if ($request->file('thumbnail')) {
            $photo=$request->thumbnail;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(370,249)->save('public/files/gallery/'.$photoname);
          $data['thumbnail']='public/files/gallery/'.$photoname;
        }

        //working with multiple images
          $images = array();
          if($request->hasFile('images')){
            foreach ($request->file('images') as $key => $image) {
              $imageName= uniqid().'.'.$image->getClientOriginalExtension();
              Image::make($image)->resize(800,400)->save('public/files/gallery/'.$imageName);
              array_push($images,$imageName);
            }
            $data['images']=json_encode($images); //database er images field ke array te dukanor por images field ke aber json encode kora hoyace
          }

          DB::table('photos')->insert($data);

          $notification=array('message' => 'Photo Inserted!','alert-type'=>'success' );
            return redirect()->back()->with($notification); 

    }

    //photo edit method
    public function photoedit($id)
    {
        $data=DB::table('photos')->where('id',$id)->first();
        return view('admin.gallery.photo.edit',compact('data'));
    }

    //photo update method
    public function photoupdate(Request $request)
    {
        $slug = Str::slug($request->title, '-');

        $data=array();
        $data['title']=$request->title;
        $data['slug']=$slug;
        $data['description']=$request->description;
        $data['status']=$request->status;
        
        //thumbnail
        if ($request->file('thumbnail')) {
            if (File::exists($request->old_thumbnail)){
              unlink($request->old_thumbnail);
            }
            $photo=$request->thumbnail;
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(370,249)->save('public/files/gallery/'.$photoname);
          $data['thumbnail']='public/files/gallery/'.$photoname;
          DB::table('photos')->where('id',$request->id)->update($data);
        }else{
            $data['thumbnail']=$request->old_thumbnail;
            DB::table('photos')->where('id',$request->id)->update($data);
        }

        //working with multiple images
            $old_images=$request->has('old_images');
            if($old_images){
                $images=$request->old_images;
                $data['images']=json_encode($images);
            }else{
              $images=array();
              $data['images']=json_encode($images);
            }

          if($request->hasFile('images')){
            foreach ($request->file('images') as $key => $image) {
              $imageName= uniqid().'.'.$image->getClientOriginalExtension();
              Image::make($image)->resize(800,400)->save('public/files/gallery/'.$imageName);
              array_push($images,$imageName);
            }
            $data['images']=json_encode($images);
         }
         DB::table('photos')->where('id',$request->id)->update($data);

          $notification=array('message' => 'Photo Update!','alert-type'=>'success' );
            return redirect()->back()->with($notification); 
    }

    //status deactive method
    public function deactive($id)
    {
        DB::table('photos')->where('id',$id)->update(['status'=>0]);
        return response()->json('Photo Deactive');
    }

    //status active method
    public function active($id)
    {
        DB::table('photos')->where('id',$id)->update(['status'=>1]);
        return response()->json('Photo Active');
    }

    //photo delete method
    public function photodestroy($id)
    {
        $photo=DB::table('photos')->where('id',$id)->first(); //photos data get
        if($image=$photo->thumbnail) {
            unlink($image);
        }

        $images=json_decode($photo->images);
          foreach($images as $image){
            if (File::exists('public/files/gallery/'.$image)) {
              File::delete('public/files/gallery/'.$image);
          }  
        }

        DB::table('photos')->where('id',$id)->delete();

        return response()->json('Photo Deleted');
    }


}
