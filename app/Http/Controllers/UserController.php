<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function edit($id) {
        $user = User::find($id);
        $perfis = Perfil::all();
        return view('users.edit', ['user' => $user, 'perfis' => $perfis]);
    }

    public function update(Request $request) {
        dd("TODO");
    }
}
