<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return view('perfil.index', [
                'user' => $user,
            ]);
        } else {
            return redirect()->route('posts.index', auth()->user()->username);
        }
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'username' => 'required|max:50|unique:users',
        ]);

        $user->update([
            'username' => Str::slug($request->username),
        ]);

        return redirect()->route('posts.index', $user->username);
    }
}
