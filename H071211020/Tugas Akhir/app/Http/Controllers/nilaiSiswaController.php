<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Nilai_siswa;
use App\Periode;
use App\Pertemuan;
use App\Siswa;
use App\Tes_siswa;
use App\Tugas_siswa;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class nilaiSiswaController extends Controller
{
    public function index() 
    {
        $siswa = Siswa::latest()->get();
        $data = Nilai_siswa::latest()->get();
        return view('admin.nilaiAkhir.index', compact('siswa', 'data'));
    }

    public function store(Request $req)
    {
        $now = Carbon::now()->format('Y');
        $periode = Periode::whereYear('tahun', $now)->first();
        $pertemuan = Pertemuan::whereYear('tanggal', $now)->first();
        $countPertemuan = Pertemuan::whereYear('tanggal', $now)->count();
        $absensi = Absensi::where('user_id', $req->user_id)->where('status', 1)->count();

        $hitungAbsensi = $absensi * 100 / $countPertemuan;

        //Tugas
        $user = User::findOrFail($req->user_id);
        $tugas = Tugas_siswa::where('siswa_id', $user->siswa->id)->avg('nilai');

        //tes
        $tes = Tes_siswa::where('siswa_id', $user->siswa->id)->avg('nilai');

        $nilaiAkhir = (($hitungAbsensi*0.2) + ($tugas*0.4) + ($tes*0.4));
        $data = new Nilai_siswa;
        $data->user_id = $req->user_id;
        $data->absensi = $hitungAbsensi;
        $data->tugas = number_format($tugas, 0, '.', '');
        $data->tes = number_format($tes, 0, '.', '');
        $data->nilai_akhir = number_format($nilaiAkhir, 2, '.', '');
        $data->save();

        return back()->withSuccess('Data berhasil disimpan');

    }

    public function edit($uuid)
    {
        $data = Nilai_siswa::where('uuid', $uuid)->first();
        return view('admin.nilaiAkhir.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Nilai_siswa::where('uuid', $uuid)->first();
        $data->absensi = $req->absensi;
        $data->tugas = $req->tugas;
        $data->tes = $req->tes;

        $nilaiAkhir = (($req->absensi*0.2) + ($req->tugas*0.4) + ($req->tes*0.4));
        $data->nilai_akhir = number_format($nilaiAkhir, 2, '.', '');
        $data->update();

        return redirect()->route('nilaiSiswaIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Nilai_siswa::where('uuid', $uuid)->first()->delete();
        return back()->withSuccess('Data berhasil dihapus');
    }
}
