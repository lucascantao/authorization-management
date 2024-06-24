<?php

namespace App\Http\Controllers;

use App\Models\Rota;
use Illuminate\Http\Request;

class RotaController extends Controller
{
    public function index() {
        $rotas = Rota::all();
        return view('rotas.index', ['rotas' => $rotas]);
    }
}
