<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showProduct()
    {
        $data = Product::with('Seller', 'Category')->paginate(10);
        $data1 = DB::table('sellers')->get();
        $data2 = DB::table('categories')->get();
        return view('product')
            ->with(compact('data'))
            ->with(compact('data1'))
            ->with(compact('data2'));
    }

    public function saveProductUseEloquent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'seller' => 'required',
            'category' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->seller_id = $request->seller;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->status = $request->status;

        $product->save();

        return redirect()->to('products')->send()->with('success', 'Data berhasil di tambahkan!');
    }

    public function saveProductUseQueryBuilder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'seller' => 'required',
            'category' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $query = DB::table('products')->insert([
            'name' => $request->input('name'),
            'seller_id' => $request->input('seller'),
            'category_id' => $request->input('category'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);

        if ($query) {
            return redirect()->to('products')->send()->with('success', 'Data berhasil di tambahkan!');
        }
    }
    public function editProductUseEloquent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'seller' => 'required',
            'category' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->seller_id = $request->seller;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->status = $request->status;

        $product->save();

        return redirect()->to('products')->send()->with('success', 'Data berhasil di edit!');
    }

    public function editProductUseQueryBuilder(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'seller' => 'required',
            'category' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        $query = DB::table('products')->where('id', $id)->update([
            'name' => $request->input('name'),
            'seller_id' => $request->input('seller'),
            'category_id' => $request->input('category'),
            'price' => $request->ipnut('price'),
            'status' => $request->input('price')
        ]);
        if ($query) {
            return redirect()->to('products')->send()->with('success', 'Data berhasih di edit');
        }
    }

    public function deleteProductUseEloquent($id)
    {
        $product = Product::where('id', $id)->delete();
        return redirect()->to('products')->send()->with('success', 'Data berhasil dihapus');
    }

    public function deleteProductUseQueryBuilder($id)
    {
        $deleted = DB::table('products')->where('id', '=', $id)->delete();
        return redirect()->to('products')->send()->with('success', 'Data berhasil dihapus');
    }
}
