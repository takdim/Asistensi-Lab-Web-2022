<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class siswaController extends Controller
{
    public function index()
    {
        $data = Siswa::orderBy('id', 'desc')->get();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.siswa.index', compact('data', 'kelas'));
    }

    public function store(Request $req)
    {
        $user = User::create($req->all());

        $user->password = Hash::make($req->password);
        if ($req->foto != null) {
            $img = $req->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $user->id;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/user', $foto);
            $user->foto = $foto;
        }
        $user->update();

        $siswa = $user->siswa()->create($req->all());

        return redirect()->back()->withSuccess('Data berhasil disimpan');

    }

    public function show($uuid)
    {
        $data = Siswa::where('uuid', $uuid)->first();
        return view('admin.siswa.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Siswa::where('uuid', $uuid)->first();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.siswa.edit', compact('data', 'kelas'));
    }

    public function update(Request $req, $uuid)
    {
        $userData = $req->except('password');
        $siswa = siswa::where('uuid', $uuid)->first();
        $user = user::where('id', $siswa->user_id)->first();
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

        $siswa->fill($req->all())->save();
        return redirect()->route('siswaIndex')->withSuccess('Data berhasil diubah');

    }

    public function updateProfileSiswa(Request $req)
    {
        $id = Auth::id();
        $userData = $req->except('password', 'username');
        $user = user::findOrFail($id);
        $siswa = Siswa::findOrFail($user->siswa->id);
        $user->fill($userData)->save();
        if (isset($req->password)) {
            $user->password = Hash::make($req->password);
        } else {
            $user->password = $user->password;
        }

        if (isset($req->username)) {
            $user->password = $req->password;
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

        $siswa->tempat_lahir = $req->tempat_lahir;
        $siswa->tanggal_lahir = $req->tanggal_lahir;
        $siswa->email = $req->email;
        $siswa->asal = $req->asal;

        $siswa->update();
        $user->update();

        return redirect()->back()->withSuccess('Profile berhasil diubah');

    }

    public function destroy($uuid)
    {
        $data = user::where('uuid', $uuid)->first();
        if (File::exists(public_path('user/' . $data->foto))) {
            File::delete(public_path('user/' . $data->foto));
        }

        $data->delete();

        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }
}
