<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function showCategory()
    {
        $data = Category::paginate(10);
        return view('Category')->with(compact('data'));
    }

    public function saveCategoryUseEloquent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->status = $request->status;

        $category->save();

        return redirect()->to('categories')->send()->with('success', 'Data berhasil di tambahkan!');
    }

    public function saveCategoryUseQueryBuilder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $query = DB::table('categories')->insert([
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);

        if ($query) {
            return redirect()->to('categories')->send()->with('success', 'Data berhasil di tambahkan!');
        }
    }

    public function editCategoryUseEloquent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->status = $request->status;

        $category->save();

        return redirect()->to('categories')->send()->with('success', 'Data berhasil di edit!');
    }

    public function editCategoryUseQueryBuilder(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $query = DB::table('categories')->where('id', $id)->update([
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);
        if ($query) {
            return redirect()->to('categories')->send()->with('success', 'Data berhasil di edit!');
        }
    }

    public function deleteCategoryUseEloquent($id)
    {
        $category = Category::where('id', $id)->delete();
        return redirect()->to('categories')->send()->with('success', 'Data berhasil di hapus!');
    }

    public function deleteCategoryUseQueryBuilder($id)
    {
        $deleted = DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->to('categories')->send()->with('success', 'Data berhasil di hapus!');
    }
}
