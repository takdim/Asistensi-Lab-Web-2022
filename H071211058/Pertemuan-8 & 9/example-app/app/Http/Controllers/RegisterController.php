<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view ('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]); 
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'name' => 'required|max:255',
        'username' => ['required', 'min:4', 'max:255', 'unique:users'],
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:8|max:255'
       ]);

       $validatedData['password'] = bcrypt($validatedData['password']);

       User::create($validatedData);

    //    $request->session()->flash('success', 'You have registered! Please login');

       return redirect('/login')->with('success', 'You have registered! Please login');

    }
}
