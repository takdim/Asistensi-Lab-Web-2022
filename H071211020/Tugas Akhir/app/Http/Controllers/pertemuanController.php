<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Komentar;
use App\Mapel;
use App\Modul;
use App\Pertemuan;
use App\Siswa;
use App\Tugas;
use App\Tugas_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pertemuanController extends Controller
{

    public function index()
    {
        $data = Pertemuan::orderBy('tanggal', 'asc')->get();
        return view('admin.pertemuan.index', compact('data'));
    }

    public function store(Request $req)
    {
        $mapel = Mapel::where('uuid', $req->uuid)->first();
        $data = $mapel->pertemuan()->create($req->all());
        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        return view('admin.pertemuan.show', compact('data'));
    }

    public function jadwalPertemuan($uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        $modul = Modul::where('pertemuan_id', $data->id)->get();
        $tugas = Tugas::where('pertemuan_id', $data->id)->get();
        return view('admin.pertemuan.jadwal', compact('data', 'modul', 'tugas'));
    }

    public function edit($uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        return view('admin.pertemuan.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();

        return redirect()->route('mapelShow', ['uuid' => $data->mapel->uuid])->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first()->delete();
        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

    public function siswaIndex()
    {
        $data = Pertemuan::orderBy('tanggal', 'desc')->get();
        return view('siswa.pertemuan.index', compact('data'));
    }

    public function instrukturIndex()
    {
        $data = Pertemuan::whereHas('mapel', function($query){
            $query->where('instruktur_id',Auth::user()->instruktur->id);
        })->with('mapel')
         ->get();
        return view('instruktur.pertemuan.jadwal', compact('data'));
    }

    public function siswaShow($uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        $modul = Modul::where('pertemuan_id', $data->id)->get();
        $tugas = Tugas::where('pertemuan_id', $data->id)->get();
        return view('siswa.pertemuan.show', compact('data', 'modul', 'tugas'));
    }

    public function jadwalInstruktur($uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        $modul = Modul::where('pertemuan_id', $data->id)->get();
        $tugas = Tugas::where('pertemuan_id', $data->id)->get();
        return view('instruktur.pertemuan.jadwalShow', compact('data', 'modul', 'tugas'));
    }

    public function adminAbsensiPertemuan($uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        return view('admin.pertemuan.absensi', compact('data'));
    }

    public function absensiPertemuan($uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        return view('instruktur.pertemuan.absensi', compact('data'));
    }

    public function absensiStore(Request $req)
    {
        $data = Absensi::create($req->all());

        return back()->withSuccess('Berhasil melakukan absensi');
    }

    public function absensiVerif($uuid)
    {
        $data = Absensi::where('uuid', $uuid)->first();
        $data->status = 1;
        $data->update();

        return back()->withSuccess('Data berhasil diverifikasi');
    }

    public function komentarStore(Request $req)
    {
        $data = Komentar::create($req->all());

        return redirect()->back()->withSuccess('Berhasil mengirim komentar');
    }

    public function komentarDestroy($uuid)
    {
        $data = Komentar::where('uuid', $uuid)->first()->delete();

        return redirect()->back()->withSuccess('Berhasil menghapus komentar');
    }

    public function tugasUpload(Request $req)
    {
        $siswa_id = Auth::user()->siswa->id;
        $data = new Tugas_siswa;
        $data->siswa_id = $siswa_id;
        $data->tugas_id = $req->tugas_id;
        $data->save();

        if ($req->file != null) {
            $img = $req->file('file');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $data->id;
            $file = $FotoName . '.' . $FotoExt;
            $img->move('tugas', $file);
            $data->file = $file;
            $data->update();
            return redirect()->back()->withSuccess('Berhasil upload tugas');
        } else {
            $data->delete();
            return redirect()->back()->withWarning('Gagal upload tugas');
        }

    }

    public function instrukturStore(Request $req)
    {
        $mapel = Mapel::where('uuid', $req->uuid)->first();
        $data = $mapel->pertemuan()->create($req->all());
        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function instrukturShow($uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        return view('instruktur.pertemuan.show', compact('data'));
    }

    public function instrukturedit($uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        return view('instruktur.pertemuan.edit', compact('data'));
    }

    public function instrukturUpdate(Request $req, $uuid)
    {
        $data = Pertemuan::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();

        return redirect()->route('instrukturMapelShow', ['uuid' => $data->mapel->uuid])->withSuccess('Data berhasil diubah');
    }
}
