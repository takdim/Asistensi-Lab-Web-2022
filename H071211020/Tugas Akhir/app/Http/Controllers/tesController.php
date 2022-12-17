<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Periode;
use App\Soal;
use App\Tes;
use App\Tes_siswa;
use App\Jawaban_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tesController extends Controller
{
    public function index()
    {
        $data = Tes::orderBy('id', 'desc')->get();
        $mapel = Mapel::orderBy('mapel', 'asc')->get();
        $periode = Periode::orderBy('tahun', 'desc')->get();
        return view('admin.tes.index', compact('data', 'mapel', 'periode'));
    }

    public function store(Request $req)
    {
        $data = Tes::create($req->all());

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $tes = Tes::where('uuid', $uuid)->first();
        $data = Tes_siswa::where('tes_id', $tes->id)->get();

        return view('admin.tes.show', compact('data', 'tes'));
    }

    public function edit($uuid)
    {
        $data = Tes::where('uuid', $uuid)->first();
        $periode = Periode::orderBy('tahun', 'desc')->get();

        return view('admin.tes.edit', compact('data', 'periode'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Tes::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();

        return redirect()->route('tesIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Tes::where('uuid', $uuid)->first()->delete();

        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

    public function siswaIndex()
    {
        $data = Tes::where('status', 0)->orderBy('id', 'desc')->get();
        return view('siswa.tes.index', compact('data'));
    }

    public function inputTes($uuid)
    {
        $siswa_id = Auth::user()->siswa->id;
        $data = Tes::where('uuid', $uuid)->first();
        $tesSiswa = Tes_siswa::where('siswa_id', $siswa_id)->where('tes_id', $data->id)->first();
        if (!$tesSiswa) {
            $tesSiswa = new Tes_siswa;
            $tesSiswa->siswa_id = $siswa_id;
            $tesSiswa->tes_id = $data->id;
            $tesSiswa->save();

            $soalData = Soal::where('mapel_id', $data->mapel_id)->get();
            $soal = $soalData->shuffle()->take(10);
            return view('siswa.tes.input', compact('data', 'soal'));
        }

        return back()->withWarning('Anda sudah melakukan tes');
    }

    public function jawaban(Request $req, $uuid)
    {
        $siswa_id = Auth::user()->siswa->id;
        $tes = Tes::where('uuid', $uuid)->first();
        $tes_siswa = Tes_siswa::where('tes_id', $tes->id)->where('siswa_id', $siswa_id)->first();
        $soal = collect($req->soal_id)->filter();
        $pilihan = collect($req->pilihan)->filter();
        for ($i = 0; $i < count($soal); $i++) {
            $jawabanSoal = Soal::findOrFail($soal[$i]);
            if ($jawabanSoal->jawaban == $pilihan[$i]) {
                $bs = 1;
            } else {
                $bs = 0;
            }
            $jawaban = new Jawaban_siswa();
            $jawaban->soal_id = $soal[$i];
            $jawaban->jawaban = $pilihan[$i];
            $jawaban->bs = $bs;
            $jawaban->tes_siswa_id = $tes_siswa->id;
            $jawaban->save();
        }
        $jawabanSiswa = Jawaban_siswa::where('tes_siswa_id', $tes_siswa->id)->where('bs', 1)->count();
        $tes_siswa->nilai = $jawabanSiswa * 10;
        $tes_siswa->update();
        return redirect()->route('siswaTesIndex')->withSuccess('Berhasil melakukan tes! Nilai anda adalah : <b>' . $tes_siswa->nilai . '</b>');
    }

}
