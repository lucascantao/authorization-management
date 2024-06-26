@extends('app')
@section('content')
<div id="content-header">
    <i class="bi bi-eye-fill"></i>
    Detalhes do Produto
</div>

<div class="card m-4 px-4 py-4">
    <div class="row">
        <div class="col-lg-6 col-md-4">
            <label class="form-label"><b>Nome:</b></label><br>
            <label class="form-label"><i>{{ $produto->nome }}</i></label>
        </div>
        <div class="col-lg-6 col-md-4">
            <label class="form-label"><b>Descrição:</b></label><br>
            <label class="form-label"><i>{{ $produto->descricao }}</i></label>
        </div>
        <div class="col-lg-6 col-md-4">
            <label class="form-label"><b>Preço:</b></label><br>
            <label class="form-label"><i>R${{ $produto->preco }}</i></label>
        </div>
    </div>

    <hr>

    <div class="mt-4">
        <a class="col-2 btn btn-secondary" href="{{route('produto.index')}}">Voltar</a>
    </div>

</div>
@endsection
