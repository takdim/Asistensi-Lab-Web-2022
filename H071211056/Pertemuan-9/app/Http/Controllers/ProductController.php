<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
   
    public function index()
    {
        $product = Product::paginate(2);
        return view ('product.index')->with('product', $product);
    }

    
    public function create()
    {
        $seller = Seller::all();
        $category = Category::all();
        $category = DB::table('category')->get();
        return view('product.create',['category'=>$category],compact('seller'),compact('category'));
        // return view('product.create');


    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        Product::create($input);
        return redirect('product')->with('flash_message', 'product Addedd!');  
    }

   
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show')->with('product', $product);
    }

   
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit')->with('product', $product);
    }

    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product')->with('flash_message', 'product Updated!'); 
    }

    
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('product')->with('flash_message', 'product deleted!');  
    }
}
