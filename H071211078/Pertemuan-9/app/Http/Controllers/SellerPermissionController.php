<?php

namespace App\Http\Controllers;

use App\Models\seller_permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerPermissionController extends Controller
{
    public function showS_Perm()
    {
        $data = seller_permission::with('sellers', 'permissions')->paginate(10);
        $data1 = DB::table('sellers')->get();
        $data2 = DB::table('permissions')->get();
        return view('seller_permission')
            ->with(compact('data'))
            ->with(compact('data1'))
            ->with(compact('data2'));
    }

    public function saveS_PermUseEloquent(Request $request)
    {
        $request->validate([
            'seller' => 'required',
            'permission' => 'required'
        ]);

        $seller_permission = new seller_permission;
        $seller_permission->seller_id = $request->seller;
        $seller_permission->permission_id = $request->permission;

        $seller_permission->save();

        return redirect()->to('seller_permission')->send()->with('success', 'Data berhasil di tambahkan!');
    }

    public function saveS_PermUseQueryBuilder(Request $request)
    {
        $request->validate([
            'seller' => 'required',
            'permission' => 'required'
        ]);

        $query = DB::table('seller_permissions')->insert([
            'seller_id' => $request->input('seller'),
            'permission_id' => $request->input('permission')
        ]);

        if ($query) {
            return redirect()->to('seller_permission')->send()->with('success', 'Data berhasil di tambahkan');
        }
    }

    public function editS_PermUseEloquent(Request $request, $id)
    {
        $request->validate([
            'seller' => 'required',
            'permission' => 'required'
        ]);

        $seller_permission = seller_permission::find($id);
        $seller_permission->seller_id = $request->seller;
        $seller_permission->permission_id = $request->permission;

        $seller_permission->save();

        return redirect()->to('seller_permission')->send()->with('success', 'Data berhasil di edit');
    }

    public function editS_PermUseQueryBuilder(Request $request, $id)
    {
        $request->validate([
            'seller' => 'required',
            'permission' => 'required'
        ]);

        $query = DB::table('seller_permissions')->where('id', $id)->update([
            'seller_id' => $request->input('seller'),
            'permission_id' => $request->input('permission')
        ]);
        if ($query) {
            return redirect()->to('seller_permission')->send()->with('success', 'Data berhasil di edit!');
        }
    }

    public function deleteS_PermUseEloquent($id)
    {
        $del_sp = seller_permission::where('id', $id)->delete();
        return redirect()->to('seller_permission')->send()->with('success', 'Data berhasil di hapus!');
    }

    public function deleteS_PermUseQueryBuilder($id)
    {
        $del_sp = DB::table('seller_permissions')->where('id', '=', $id)->delete();
        return redirect()->to('seller_permission')->send()->with('success', 'Data berhasil di hapus!');
    }
}
