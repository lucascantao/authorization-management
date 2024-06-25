<?php

namespace App\Http\Controllers;

use App\Models\Rota;
use App\Models\Perfil;
use Illuminate\Http\Request;

class RotaController extends Controller
{
    public function index() {
        $rotas = Rota::all();
        return view('rotas.index', ['rotas' => $rotas]);
    }

    public function settings($id) {
        $rota = Rota::find($id);

        return view('rotas.settings', ['rota' => $rota]);
    }

    public function createSettings($id) {
        $rota = Rota::find($id);
        $perfis = Perfil::all();

        return view('rotas.settings.create', ['rota' => $rota, 'perfis' => $perfis]);

    }

    public function storeSettings(Request $request) {
        // dd(isset($request->all()['perfil_id']));


        $data = $request->all();

        $rota = Rota::find($data['rota_id']);
        $perfil = Perfil::find($data['perfil_id']);

        if( ( $rota->perfis()->where('perfil_id', $perfil->id)->first() ) != null){
            return redirect()->back()->withInput()->withErrors(['error' => 'Esta configuração de perfil já existe para esta rota']);
        }

        $settings = [
            'create' => isset($data['checkBox_create']) ? 1 : 0,
            'read' => isset($data['checkBox_read']) ? 1 : 0,
            'update' => isset($data['checkBox_update']) ? 1 : 0,
            'delete' => isset($data['checkBox_delete']) ? 1 : 0,
        ];


        $rota->perfis()->attach([$perfil->id => $settings]);

        return redirect(route('rota.settings', ['id' => $rota->id]));
    }
}
