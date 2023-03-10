<?php

namespace App\Http\Controllers;

use App\Models\User;

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
}
