<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Rota;
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

    public function createSettings($id) {
        $rotas = Rota::all();
        $perfil = Perfil::find($id);

        return view('perfis.settings.create', ['rotas' => $rotas, 'perfil' => $perfil]);

    }

    public function storeSettings(Request $request) {
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

        return redirect(route('perfil.detail', ['id' => $perfil->id]));
    }
}
