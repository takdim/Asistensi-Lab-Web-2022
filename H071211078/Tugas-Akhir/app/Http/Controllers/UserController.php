<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function manage()
    {
        $users = User::all();
        return view('BackEnd.user.manageUser',compact('users'));
    }

    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        return back()->with('sms','User deleted');

    }
}
