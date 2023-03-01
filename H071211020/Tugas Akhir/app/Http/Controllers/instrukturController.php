<?php

namespace App\Http\Controllers;

use App\Instruktur;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class instrukturController extends Controller
{
    public function index()
    {
        $data = User::where('role', 3)->orderBy('nama', 'asc')->get();

        return view('admin.instruktur.index', compact('data'));
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

        $instruktur = $user->instruktur()->create($req->all());

        return redirect()->back()->withSuccess('Data berhasil disimpan');

    }

    public function show($uuid)
    {
        $data = Instruktur::where('uuid', $uuid)->first();
        return view('admin.instruktur.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Instruktur::where('uuid', $uuid)->first();

        return view('admin.instruktur.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $userData = $req->except('password');
        $instruktur = instruktur::where('uuid', $uuid)->first();
        $user = user::where('id', $instruktur->user_id)->first();
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

        $instruktur->fill($req->all())->save();
        return redirect()->route('instrukturIndex')->withSuccess('Data berhasil diubah');

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
