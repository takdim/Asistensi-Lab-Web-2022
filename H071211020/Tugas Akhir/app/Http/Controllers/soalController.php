<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Soal;
use File;
use Illuminate\Http\Request;

class soalController extends Controller
{
    public function index()
    {
        $data = Soal::orderBy('id', 'desc')->get();
        $mapel = Mapel::orderBy('mapel', 'asc')->get();
        return view('admin.soal.index', compact('data', 'mapel'));
    }

    public function store(Request $req)
    {
        $data = Soal::create($req->all());
        if ($req->gambar != null) {
            $img = $req->file('gambar');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $data->id;
            $gambar = $FotoName . '.' . $FotoExt;
            $img->move('soal', $gambar);
            $data->gambar = $gambar;
        }
        $data->update();

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Soal::where('uuid', $uuid)->first();

        return view('admin.soal.show', compact('data'));
    }


    public function edit($uuid)
    {
        $data = Soal::where('uuid', $uuid)->first();
        $mapel = Mapel::orderBy('mapel', 'asc')->get();

        return view('admin.soal.edit', compact('data', 'mapel'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Soal::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();
        if ($req->gambar != null) {
            $img = $req->file('gambar');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $data->id;
            $gambar = $FotoName . '.' . $FotoExt;
            $img->move('soal', $gambar);
            $data->gambar = $gambar;
        }
        $data->update();

        return redirect()->route('soalIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Soal::where('uuid', $uuid)->first();
        if (File::exists(public_path('soal/' . $data->gambar))) {
            File::delete(public_path('soal/' . $data->gambar));
        }

        $data->delete();

        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }
}
