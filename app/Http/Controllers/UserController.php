<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perfil;
use Exception;
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

    public function update(Request $request, $id) {
        $user = User::find($id);

        $perfil = Perfil::find($request['perfil_id']);

        $request->validate([
            'name' => 'required',
            'perfil_id' => 'required'
        ]);

        try {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();

            $perfil->users()->save($user);

            return redirect(route('user.index'))->with('success', 'Usuário alterado com sucesso');
        } catch(Exception $e) {
            dd($e);

            return redirect()->back()->withInput()->withErrors(['error', 'Houve um erro ao salvar o usuário' . $e]);
        }

        $user->save();
    }
}
