<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
   
    public function index()
    {
        $permission = Permission::paginate(2);
        return view ('permission.index')->with('permission', $permission);
    }

    
    public function create()
    {
        return view('permission.create');
    }

   
    public function store(Request $request)
    {
        $input = $request->all();
        Permission::create($input);
        return redirect('permission')->with('flash_message', 'permission Addedd!');
    }

   
    public function show($id)
    {
        $permission = Permission::find($id);
        return view('permission.show')->with('permission', $permission);
    }

    
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permission.edit')->with('permission', $permission);
    }

   
    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        $input = $request->all();
        $permission->update($input);
        return redirect('permission')->with('flash_message', 'permission Updated!'); 
    }

   
    public function destroy($permission_id)
    {
        Permission::destroy($permission_id);
        return redirect('permission')->with('flash_message', 'permission deleted!');  
    }
}
