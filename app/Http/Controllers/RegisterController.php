<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'username' => 'required|min:3|max:30|unique:users',
            'email' => 'required|email|max:60|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index', auth()->user());
    }
}
