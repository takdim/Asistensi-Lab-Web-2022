<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Mapel;
use App\Modul;
use App\Nilai_siswa;
use App\Periode;
use PDF;
use Carbon\Carbon;
use App\Siswa;
use App\Pertemuan;
use App\Tes;
use App\User;
use App\Tes_siswa;
use App\Tugas;
use App\Tugas_siswa;
use Illuminate\Http\Request;

class reportController extends Controller
{

    public function siswa()
    {
        $data         = Siswa::all();
        $kepsek       = Periode::latest()->first();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf          = PDF::loadView('formCetak.siswa', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Data Siswa.pdf');
    }

    public function mapel()
    {
        $data         = Mapel::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.mapel', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Mata Pelajaran.pdf');
    }

    public function pertemuan()
    {
        $data = Pertemuan::orderBy('tanggal', 'asc')->get();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.pertemuan', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Jadwal Pertemuan.pdf');
    }

    public function pertemuanMapel($uuid)
    {
        $mapel        = Mapel::where('uuid',$uuid)->first();
        $data         = Pertemuan::where('mapel_id',$mapel->id)->orderBy('tanggal', 'asc')->get();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.pertemuanMapel', ['data'=>$data,'tgl'=>$tgl,'mapel'=>$mapel,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Jadwal Pertemuan.pdf');
    }

    public function instruktur() 
    {
        $data         = User::where('role', 3)->orderBy('nama', 'asc')->get();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.instruktur', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Instruktur.pdf');
    }

    public function hasilTes() 
    {
        $data         = Tes_siswa::all();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.hasilTes', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Hasil Tes.pdf');
    }

    public function hasilTesFilterHasil(Request $request) 
    {
        $status = $request->status;
        if( $status == 1 ){
            $data         = Tes_siswa::where('nilai','>=',70)->get();
        }else{
            $data         = Tes_siswa::where('nilai','<=',70)->get();
        }
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.hasilTesFilterHasil', ['data'=>$data,'tgl'=>$tgl,'status'=>$status,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Lulus / Tidak Tes .pdf');
    }

    public function hasilTesFilterTes(Request $request) 
    {       
        $data         = Tes_siswa::where('tes_id',$request->tes_id)->get();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.hasilTesFilterTes', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data per Tes .pdf');
    }

    public function tugas() 
    {
        $data         = Tugas_siswa::all();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.tugas', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Tugas.pdf');
    }

    public function tugasFilter(Request $request) 
    {   
        $tugas        = Tugas::findOrFail($request->tugas_id);
        $data         = Tugas_siswa::where('tugas_id',$request->tugas_id)->get();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.tugasFilter', ['data'=>$data,'tgl'=>$tgl,'tugas'=>$tugas,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Tugas Filter .pdf');
    }

    public function modul() 
    {
        $data         = Modul::all();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.modul', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Modul.pdf');
    }

    public function dataTugas() 
    {
        $data         = Tugas::all();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.dataTugas', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Tugas.pdf');
    }


    public function dataTes() 
    {
        $data         = Tes::all();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.dataTes', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Tes.pdf');
    }


    public function dataHasilTes() 
    {
        $data         = Tes::all();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.dataHasilTes', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Tes.pdf');
    }

    public function absensi($uuid) 
    {
        $data         = Pertemuan::where('uuid', $uuid)->first();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.dataAbsensi', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Absensi.pdf');
    }

    public function nilaiAkhir() 
    {
        $data         = Nilai_siswa::latest()->get();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.dataNilaiAkhir', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Nilai Akhir.pdf');
    }

    public function absensiKeseluruhan() 
    {
        $data         = Absensi::latest('pertemuan_id')->get();
        $tgl          = Carbon::now()->format('d-m-Y');
        $kepsek       = Periode::latest()->first();
        $pdf          = PDF::loadView('formCetak.dataAbsensiKeseluruhan', ['data'=>$data,'tgl'=>$tgl,'kepsek'=>$kepsek]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Absensi Keseluruhan.pdf');
    }

}
