<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //all category show method
    public function index()
    {
        $data=Category::all();
        return view('admin.category.category.index',compact('data'));
    }

    //category store method
    public function store(Request $request)
    {
        $validated = $request->validate([
        'category_name' => 'required|unique:categories|max:55',
        ]);

        $data=Category::insert([
            'category_name' =>$request->category_name,
            'category_slug'=>Str::slug($request->category_name, '-'),
            'frontend'=>$request->frontend,
        ]);
        $notification=array('message' => 'Category Inserted!','alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }

    //category edit method
    public function edit($id)
    {
        $data=Category::findOrfail($id);
        return view('admin.category.category.edit',compact('data'));
    }

    //category update method
    public function update(Request $request)
    {
        $data=Category::where('id',$request->id)->first();
        $data->update([
            'category_name' =>$request->category_name,
            'category_slug'=>Str::slug($request->category_name, '-'),
            'frontend'=>$request->frontend,
        ]);

        $notification=array('message' => 'Category Updated!','alert-type'=>'success' );
        return redirect()->back()->with($notification);
        
    }

    //category delete method
    public function destroy($id)
    {
        $data=Category::findOrfail($id);
        $data->delete();
        $notification=array('message' => 'Category Deleted!','alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }


}
