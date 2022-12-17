<?php

namespace App\Http\Controllers;

use App\Periode;
use Illuminate\Http\Request;

class periodeController extends Controller
{
    public function index()
    {
        $data = Periode::orderBy('id', 'Desc')->get();
        return view('admin.periode.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Periode::create($req->all());
        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Periode::where('uuid', $uuid)->first();
        return view('admin.periode.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Periode::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();
        return redirect()->route('periodeIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Periode::where('uuid', $uuid)->first()->delete();
        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

}
