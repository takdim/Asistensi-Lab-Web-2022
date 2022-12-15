<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        $data = Mahasiswa::paginate(7);
        return view('index', compact('data'));
    }

    public function tambah() {
        return view('tambah');
    }

    public function tambahdata(Request $request) {
        // dd($request->all());
        Mahasiswa::create($request->all()); //
        return redirect()->route('mahasiswa')->with('toast_success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $data = Mahasiswa::find($id);
        // dd($data);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $data = Mahasiswa::find($id);
        $data->update($request->all());

        return redirect()->route('mahasiswa')->with('toast_success', 'Data berhasil diupdate');
    }

    public function delete($id) {
        $data = Mahasiswa::find($id);
        $data->delete();

        return redirect()->route('mahasiswa')->with('toast_success', 'Data berhasil dihapus');
    }
}