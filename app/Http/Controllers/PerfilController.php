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

    public function detail($id) {
        $perfil = Perfil::find($id);
        return view('perfis.detail', ['perfil' => $perfil]);
    }
}
