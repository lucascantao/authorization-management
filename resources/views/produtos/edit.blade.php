@extends('app')
@section('content')
<div id="content-header">
    <i class="bi bi-pencil-fill"></i>
    Produtos > Editar Produto
</div>

<div class="card m-4 px-4 py-4">
    @include('components.notification')
    <form action="{{route('produto.update', ['produto' => $produto->id])}}" method="PUT">
        @csrf

        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="produto_name">Nome</label>
                <input class="form-control" type="text" name="produto_nome" value="{{$produto->nome}}" />
            </div>

            <div class="col">
                <label class="form-label" for="produto_descricao">Descrição</label>
                <input class="form-control" type="text" name="produto_descricao" value="{{$produto->descricao}}"/>
            </div>

            <div class="col">
                <label class="form-label" for="produto_descricao">Preço</label>
                <input class="form-control" type="text" name="produto_preco" id="produto_preco" value="{{$produto->preco}}"/>
            </div>

        </div>
        <div class="mt-4">
            <button type="submit" class="col-2 btn btn-semas me-2">Salvar</button>
            <a class="col-2 btn btn-secondary" href="{{route('produto.index')}}">Voltar</a>
        </div>

    </form>
</div>

<script>
    
    $("#produto_preco").maskMoney({
        prefix:'R$',
        decimal:',',
        thousands:'.'
    })


    $("#produto_preco").focus();
</script>
@endsection
