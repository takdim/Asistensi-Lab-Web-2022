<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::paginate(2);
        return view ('category.index')->with('category', $category);
    }

   
    public function create()
    {
        return view('category.create');
    }

   
    public function store(Request $request)
    {
        $input = $request->all();
        Category::create($input);
        return redirect('category')->with('flash_message', 'category Addedd!');
    }

   
    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show')->with('category', $category);
    }

    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit')->with('category', $category);
    }

    
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $input = $request->all();
        $category->update($input);
        return redirect('category')->with('flash_message', 'category Updated!');
    }

    
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('category')->with('flash_message', 'category deleted!');  
    }
}
