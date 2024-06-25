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

    public function detail($id) {
        $rota = Rota::find($id);
        // $pivot = $rota->perfis->first()->pivot;

        // $permissions = [
        //     'create' => $pivot->create,
        //     'read' => $pivot->read,
        //     'update' => $pivot->update,
        //     'delete' => $pivot->delete,
        // ];

        return view('rotas.detail', ['rota' => $rota]);
    }
}
