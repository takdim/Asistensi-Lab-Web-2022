<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Pertemuan;
use App\Siswa;
use App\Tugas;
use App\Tugas_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tugasSiswaController extends Controller
{
    public function index()
    {
        $data = Tugas_siswa::orderBy('id', 'desc')->get();
        return view('admin.tugasSiswa.index', compact('data'));
    }

    public function filter()
    {
        $data = Tugas::orderBy('id', 'desc')->get();
        return view('admin.tugasSiswa.filter', compact('data'));
    }

    public function instrukturIndex()
    {
        $instruktur = Auth::user()->instruktur->id;
        $mapel = Mapel::with('pertemuan')->where('instruktur_id', $instruktur)->get();
        $data = $mapel->map(function ($item) {
            $pertemuan = Pertemuan::with('tugas')->where('mapel_id', $item->id)->get();
            return $pertemuan;
        });
        return view('instruktur.tugasSiswa.index', compact('data'));
    }

    public function tugasSiswaShow($uuid)
    {
        $tugas = Tugas::where('uuid', $uuid)->first();
        $siswa = Siswa::all();
        $data = Tugas_siswa::where('tugas_id', $tugas->id)->get();
        return view('instruktur.tugasSiswa.show', compact('data', 'tugas', 'siswa'));
    }

    public function nilaiStore(Request $req)
    {
        $data = Tugas_siswa::findOrFail($req->id);
        $data->nilai = $req->nilai;
        $data->update();

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function siswaIndex()
    {
        $data = Tugas_siswa::where('siswa_id',Auth::user()->siswa->id)->get();
        return view('siswa.hasilTugas.index', compact('data'));
    }

}
