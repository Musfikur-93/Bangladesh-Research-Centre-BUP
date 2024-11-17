<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use App\Models\Publication;
use App\Models\Author;
use App\Models\Artical;
use Illuminate\Support\Str;

class ArticalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //artical create method
    public function create()
    {
        $author=Author::all();
        $publication=Publication::all();

        return view('admin.artical.create',compact('author','publication'));
    }

    //artical index method
    public function index(Request $request)
    {
        if($request->ajax()){
            $data=Artical::latest()->get();

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

                        $actionbtn='<a href="'.route('artical.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>';

                            return $actionbtn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
            }

        return view('admin.artical.index');
    }

    //artical store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|unique:articals',
        'author_id' => 'required',
        'publication_id' => 'required',
        'file' => 'required|mimes:pdf,doc,docx|max:5000',
        ]);

        $slug=Str::slug($request->title, '-');

        $data=array();
        $data['artical_title']=$request->artical_title;
        $data['title']=$request->title;
        $data['author_id']=$request->author_id;
        $data['publication_id']=$request->publication_id;
        $data['slug']=Str::slug($request->title, '-');
        $data['date']=date('d-m-Y');
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status']=$request->status;

       
        if ($request->file('file')) {
            $document=$request->file;
            $documentname=$slug.'.'.$document->getClientOriginalExtension();
            $document->move('public/files/artical/',$documentname);
          $data['file']=$documentname; 
        }

        DB::table('articals')->insert($data);

        $notification=array('message' => 'Artical Inserted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }

    //artical destroy method
    public function destroy($id)
    {
        $data=Artical::findOrfail($id);
          if($file=$data->file) {
            File::delete('public/files/artical/'.$file);
          }
          $data->delete();

        $notification=array('message' => 'Artical Deleted!','alert-type'=>'success' );
          return redirect()->back()->with($notification);
    }


}
