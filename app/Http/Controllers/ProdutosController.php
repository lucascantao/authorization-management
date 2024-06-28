<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {
        $produtos = Produto::all();
        return view('produtos.index', ['produtos' => $produtos]);
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(Request $request) {

        // dd($request->all());

        $request->validate([
            'produto_nome' => 'required',
            'produto_preco' => 'required'
        ]);

        try {

            Produto::create([
                'nome' => $request['produto_nome'],
                'descricao' => $request['produto_descricao'],
                'preco' => str_replace(array('R$','.',','), array('','','.'),$request['produto_preco']),
            ]);
    
            return redirect(route('produto.index'))->with('success', 'Produto criado com sucesso');

        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error', 'Houve um erro ao registrar o produto' . $e]);
        }

        

    }

    public function show($id) {
        $produto = Produto::find($id);
        return view('produtos.show', ['produto' => $produto]);
    }

    public function edit($id) {
        $produto = Produto::find($id);
        return view('produtos.edit', ['produto' => $produto]);
    }

    public function update(Request $request, $id) {

        $produto = Produto::find($id);

        $request->validate([
            'produto_nome' => 'required',
            'produto_preco' => 'required'
        ]);

        $produto->nome = $request['nome'];
        $produto->preco = str_replace(array('R$','.',','), array('','','.'),$request['produto_preco']);
        $produto->descricao = $request['descricao'];

        $produto->save();

        return redirect(route('produto.index'))->with('success', 'Produto atualizado com sucesso');

    }

    public function destroy() {

    }
}
