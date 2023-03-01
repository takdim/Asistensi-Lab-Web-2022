<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $data = User::where('role', 2)->orderBy('id', 'desc')->get();

        return view('admin.user.index', compact('data'));
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
            $user->update();
        }
        $user->update();

        return redirect()->back()->withSuccess('Data berhasil disimpan');

    }

    public function show($uuid)
    {
        $data = User::findOrFail($uuid);
        return view('admin.user.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = User::findorFail($uuid);
        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
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

        return redirect()->route('userIndex')->withSuccess('Data berhasil diubah');

    }

    public function destroy($uuid)
    {
        $data = user::findOrFail($uuid);
        if (File::exists(public_path('user/' . $data->user))) {
            File::delete(public_path('user/' . $data->user));
        }

        $data->delete();

        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

}
