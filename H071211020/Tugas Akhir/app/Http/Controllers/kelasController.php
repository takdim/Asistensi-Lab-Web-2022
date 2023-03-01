<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class kelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();
        return view('admin.kelas.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Kelas::create($req->all());
        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Kelas::where('uuid', $uuid)->first();
        return view('admin.kelas.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Kelas::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();
        return redirect()->route('kelasIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Kelas::where('uuid', $uuid)->first()->delete();
        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

}
