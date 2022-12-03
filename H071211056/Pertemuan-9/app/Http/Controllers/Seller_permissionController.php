<?php

namespace App\Http\Controllers;

use App\Models\Seller_permission;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Permission;

class Seller_permissionController extends Controller
{
    
    public function index()
    {
        $seller_permission = Seller_permission::paginate(2);
        return view ('seller_permission.index')->with('seller_permission', $seller_permission);
    }

    
    public function create()
    {
        $seller = Seller::all();
        $permission = Permission::all();
        return view('seller_permission.create', compact('seller'), compact('permission'));
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        Seller_permission::create($input);
        return redirect('seller_permission')->with('flash_message', 'seller_permission Addedd!'); 
    }

    
    public function show($id)
    {
        $seller_permission = Seller_permission::find($id);
        return view('seller_permission.show')->with('seller_permission', $seller_permission);
    }

    
    public function edit($id)
    {
        $seller_permission = Seller_permission::find($id);
        return view('seller_permission.edit')->with('seller_permission', $seller_permission);
    }

    
    public function update(Request $request, $seller_id)
    {
        $seller_permission = Seller_permission::find($seller_id);
        $input = $request->all();
        $seller_permission->update($input);
        return redirect('seller_permission')->with('flash_message', 'seller_permission Updated!'); 
    }

    
    public function destroy($seller_id)
    {
        Seller_permission::destroy($seller_id);
        return redirect('seller_permission')->with('flash_message', 'seller_permission deleted!');  
    }
}
