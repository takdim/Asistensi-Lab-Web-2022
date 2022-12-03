<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PermissionController extends Controller
{
    public function showPermission()
    {
        $data = Permission::paginate(10);
        return view('Permission')->with(compact('data'));
    }

    public function savePermissionUseEloquent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->status = $request->status;

        $permission->save();

        return redirect()->to('permissions')->send()->with('success', 'Data berhasil di tambahkan!');
    }

    public function savePermissionUseQueryBuilder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $query = DB::table('permissions')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status')
        ]);

        if ($query) {
            return redirect()->to('permissions')->send()->with('success', 'Data berhasil di tambahkan!');
        }
    }

    public function editPermissionUseEloquent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->status = $request->status;

        $permission->save();

        return redirect()->to('permissions')->send()->with('success', 'Data berhasil di edit!');
    }

    public function editPermissionUseQueryBuilder(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $query = DB::table('permissions')->where('id', $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status')
        ]);
        if ($query) {
            return redirect()->to('permission')->send()->with('success', 'Data berhasil di edit!');
        }
    }

    public function deletePermissionUseEloquent($id)
    {
        $permission = permission::where('id', $id)->delete();
        return redirect()->to('permission')->send()->with('success', 'Data berhasil di hapus!');
    }

    public function deletePermissionUseQueryBuilder($id)
    {
        $permission = DB::table('permissions')->where('id', '=', $id)->delete();
        return redirect()->to('permission')->send()->with('success', 'Data berhasil di hapus!');
    }
}
