<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
   
    public function index()
    {
        $seller = Seller::paginate(2);
        return view ('seller.index')->with('seller', $seller);

    }

    
    public function create()
    {
        return view('seller.create');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        Seller::create($input);
        return redirect('seller')->with('flash_message', 'seller Addedd!');  
    }

   
    public function show($id)
    {
        $seller = Seller::find($id);
        return view('seller.show')->with('seller', $seller);
    }

    
    public function edit($id)
    {
        $seller = Seller::find($id);
        return view('seller.edit')->with('seller', $seller);
    }

   
    public function update(Request $request, $id)
    {
        $seller = Seller::find($id);
        $input = $request->all();
        $seller->update($input);
        return redirect('seller')->with('flash_message', 'Seller Updated!'); 
    }

    public function destroy($id_permission)
    {
        Seller::destroy($id_permission);
        return redirect('seller')->with('flash_message', 'seller deleted!');  
    }
}

