<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use DB;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //subcategory method for read data from database
    public function index()
    {
        $data=Subcategory::all();
        $category=Category::all();

        return view('admin.category.subcategory.index',compact('data','category'));
    }

    //subcategory store method
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_name' => 'required|max:55',
        ]);

        Subcategory::insert([
            'subcategory_name' =>$request->subcategory_name,
            'subcategory_slug'=>Str::slug($request->subcategory_name, '-'),
            'category_id'=>$request->category_id,
        ]);

        $notification=array('message' => 'Subcategory Inserted!','alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }

    //subcategory edit method
    public function edit($id)
    {
        $data=DB::table('subcategories')->where('id',$id)->first();
        $category=DB::table('categories')->get();

        return view('admin.category.subcategory.edit',compact('data','category'));
    }

    //subcategory update method
    public function update(Request $request)
    {
        /*$data=DB::table('subcategories')->where('id',$request->id)->first();
        $data=array();
        $data['subcategory_name']=$request->subcategory_name;
        $data['subcategory_slug']=Str::slug($request->subcategory_name, '-');
        $data['category_id']=$request->category_id;

        DB::table('subcategories')->where('id',$request->id)->update($data);*/

        $data=Subcategory::where('id',$request->id)->first();
        $data->update([
            'subcategory_name' =>$request->subcategory_name,
            'subcategory_slug'=>Str::slug($request->subcategory_name, '-'),
            'category_id'=>$request->category_id,
        ]);

        $notification=array('message' => 'Subcategory Updated!','alert-type'=>'success' );
        return redirect()->back()->with($notification);

    }

    //subcategory destroy method
    public function destroy($id)
    {
        //DB::table('subcategories')->where('id',$id)->delete();

        $data=Subcategory::findOrfail($id);
        $data->delete();

        $notification=array('message' => 'Subcategory Deleted!','alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
}
