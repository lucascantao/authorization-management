<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index() {
        $perfis = Perfil::all();
        return view('perfis.index', ['perfis' => $perfis]);
    }

    public function create() {
        return view('perfis.create');
    }

    public function store(Request $request) {
        Perfil::create(['nome' => $request['perfil_nome']]);
        return redirect(route('perfil.index'))->with('success', 'Perfil criado com sucesso');
    }

    public function detail($id) {
        $perfil = Perfil::find($id);
        return view('perfis.detail', ['perfil' => $perfil]);
    }
}
