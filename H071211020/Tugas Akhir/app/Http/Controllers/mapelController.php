<?php

namespace App\Http\Controllers;

use App\Instruktur;
use App\Mapel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class mapelController extends Controller
{
    public function index()
    {
        $data = Mapel::orderBy('id', 'Desc')->get();
        $instruktur = Instruktur::orderBy('id', 'Desc')->get();
        return view('admin.mapel.index', compact('data', 'instruktur'));
    }

    public function store(Request $req)
    {
        $data = Mapel::create($req->all());
        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Mapel::where('uuid', $uuid)->first();
        return view('admin.mapel.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Mapel::where('uuid', $uuid)->first();
        $instruktur = Instruktur::orderBy('id', 'Desc')->get();
        return view('admin.mapel.edit', compact('data', 'instruktur'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Mapel::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();
        return redirect()->route('mapelIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Mapel::where('uuid', $uuid)->first()->delete();
        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

    public function instrukturIndex()
    {
        $instruktur_id = Auth::user()->instruktur->id;
        $data = Mapel::where('instruktur_id', $instruktur_id)->get();
        return view('instruktur.mapel.index', compact('data'));
    }

    public function instrukturShow($uuid)
    {
        $data = Mapel::where('uuid', $uuid)->first();
        return view('instruktur.mapel.show', compact('data'));
    }

}
