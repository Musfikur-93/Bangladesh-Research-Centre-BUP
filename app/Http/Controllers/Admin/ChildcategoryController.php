<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use DB;

class ChildcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //child category index method
    public function index()
    {
        $data=Childcategory::all();
        $category=Category::all();
        return view('admin.category.childcategory.index',compact('category','data'));
    }

    //child category store method
    public function store(Request $request)
    {
        $validated = $request->validate([
            'childcategory_name' => 'required|max:55',
        ]);

        $subcat=DB::table('subcategories')->where('id',$request->subcategory_id)->first(); //subcategory table a category_id biddoman tai subcategory table ke ana hoyece. 

        $data=array();
        $data['category_id']=$subcat->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['childcategory_name']=$request->childcategory_name;
        $data['childcategory_slug']=Str::slug($request->childcategory_name, '-');

        DB::table('childcategories')->insert($data);

        $notification=array('message' => 'Childcategory Inserted!','alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }

    //child category edit method
    public function edit($id)
    {
        $category=Category::all();
        $data=Childcategory::where('id',$id)->first();

        return view('admin.category.childcategory.edit',compact('category','data'));
    }

    //child category update
    public function update(Request $request)
    {
        $subcat=DB::table('subcategories')->where('id',$request->subcategory_id)->first();
        
        $data=Childcategory::where('id',$request->id)->first();
        $data->update([
            'category_id'=>$subcat->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'childcategory_name'=>$request->childcategory_name,
            'childcategory_slug'=>Str::slug($request->childcategory_name, '-'),
        ]);

        $notification=array('message' => 'Childcategory Updated!','alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }

    //child category destroy method
    public function destroy($id)
    {
        $data=Childcategory::findOrfail($id);
        $data->delete();

        $notification=array('message' => 'Childcategory Deleted!','alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
}
