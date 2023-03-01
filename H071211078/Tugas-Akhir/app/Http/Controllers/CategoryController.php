<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        return view ('BackEnd.category.addCategory');    
    }
    public function save(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_status = $request->category_status;
        $category->added_on = $request->added_on;
        $category->save();

        return back()->with('sms','Category Saved'); 

    }

    public function manage()
    {
        $categories = Category::all();

        return view('BackEnd.category.manageCategory',compact('categories'));
    }

    public function active($category_id)
    {
        $category = Category::find($category_id);
        $category->category_status = 1;
        $category->save();

        return back();
    }
    public function Inactive($category_id)
    {
        $category = Category::find($category_id);
        $category->category_status = 0;
        $category->save();

        return back();
    }

    public function delete($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        return back();

    }

    public function update(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->category_name =  $request->category_name;
        
        $category->save();

        return redirect('/category/manage')->with('sms', 'Category updated');
    }
}
