<?php

namespace App\Http\Controllers;

use App\Instruktur;
use App\Mapel;
use App\Pertemuan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function adminIndex()
    {
        return view('admin.index');
    }

    public function adminProfilEdit()
    {
        $data = User::findOrFail(Auth::id());
        return view('admin.profilEdit', compact('data'));
    }

    public function adminProfilUpdate(Request $req)
    {
        $userData = $req->except('password');
        $user = User::findOrFail(Auth::id());
        $user->fill($userData)->save();
        if (isset($req->password)) {
            $user->password = Hash::make($req->password);
        } else {
            $user->password = $user->password;
        }

        if ($req->foto != null) {
            $img = $req->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $user->id;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/user', $foto);
            $user->foto = $foto;
        } else {
            $user->foto = $user->foto;
        }

        $user->update();

        return redirect()->route('adminIndex')->withSuccess('Profil berhasil diubah');

    }

    public function siswaIndex()
    {
        $pertemuan = Pertemuan::orderBy('tanggal', 'asc')->paginate(5);
        $mapel = Mapel::all();
        return view('siswa.index', compact('mapel', 'pertemuan'));
    }

    public function instrukturIndex()
    {
        return view('instruktur.index');
    }

    public function instrukturProfil()
    {
        $data = Auth::user();
        return view('instruktur.profil', compact('data'));
    }

    public function instrukturProfileUpdate(Request $req, $uuid)
    {
        $userData = $req->except('password');
        $user = User::findOrFail($uuid);
        $user->fill($userData)->save();
        if (isset($req->password)) {
            $user->password = Hash::make($req->password);
        } else {
            $user->password = $user->password;
        }

        if ($req->foto != null) {
            $img = $req->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $user->id;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/user', $foto);
            $user->foto = $foto;
        } else {
            $user->foto = $user->foto;
        }

        $user->update();

        $instruktur = Instruktur::where('user_id', $user->id)->first();
        $instruktur->fill($req->all())->save();

        return back()->withSuccess('Profil berhasil diupdate');

    }
}
