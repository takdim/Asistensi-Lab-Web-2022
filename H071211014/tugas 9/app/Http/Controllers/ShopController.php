<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function shop(){
        return view('layout.shop');
    }

  public function insertdata(Request $request){
   Shop::create($request->all());
   return view('layout.shop');
  }

  public function showdata(){
    $data = Shop::paginate(3);
    return view('layout.dbshop',compact('data'));
  }

 public function tampildata($id){
  $data = Shop::find($id);

  return view('layout.tampildata',compact('data'));
 }

 public function edit(Request $request, $id){

  // dd($request);

  $data = Shop::find($id)->update($request->all()); 
  // $data->update($request->all());
  return redirect()->route('showdata')->with('success','Data have been inserted');

 }

 public function delete($id){
  $data = Shop::where('id',$id)->delete();
      
  return redirect()->route('showdata')->with('success','Data berhasil dihapus');
 }
}
