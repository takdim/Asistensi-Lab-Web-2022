<?php

namespace App\Http\Controllers;

use App\Modul;
use App\Pertemuan;
use File;
use Illuminate\Http\Request;

class modulController extends Controller
{

    public function index()
    {
        $data = Modul::orderBy('id', 'desc')->get();
        return view('admin.modul.index', compact('data'));
    }

    public function store(Request $req)
    {
        $pertemuan = Pertemuan::where('uuid', $req->uuid)->first();
        $data = $pertemuan->modul()->create($req->all());
        if ($req->file != null) {
            $img = $req->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $data->id;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('modul', $file);
            $data->file = $file;
        }
        $data->update();

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Modul::where('uuid', $uuid)->first();
        return view('admin.modul.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Modul::where('uuid', $uuid)->first();
        return view('admin.modul.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Modul::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();
        if ($req->file != null) {
            $img = $req->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $data->id;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('modul', $file);
            $data->file = $file;
        } else {
            $data->file = $data->file;
        }
        $data->update();

        return redirect()->route('pertemuanShow', ['uuid' => $data->pertemuan->uuid])->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Modul::where('uuid', $uuid)->first();
        File::delete('modul/' . $data->file);
        $data->delete();
        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

    public function instrukturEdit($uuid)
    {
        $data = Modul::where('uuid', $uuid)->first();
        return view('instruktur.modul.edit', compact('data'));
    }

    public function instrukturUpdate(Request $req, $uuid)
    {
        $data = Modul::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();
        if ($req->file != null) {
            $img = $req->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $data->id;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('modul', $file);
            $data->file = $file;
        } else {
            $data->file = $data->file;
        }
        $data->update();

        return redirect()->route('instrukturPertemuanShow', ['uuid' => $data->pertemuan->uuid])->withSuccess('Data berhasil diubah');
    }
}
