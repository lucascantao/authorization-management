@extends('app')
@section('content')
<div id="content-header">
    <i class="bi bi-bag-fill"></i>
    Perfis > Novo perfil
</div>

<div class="card m-4 px-4 py-4">
    @include('components.notification')
    <form action="{{route('perfil.store')}}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="perfil_nome">Nome</label>
                <input class="form-control" type="text" name="perfil_nome" value="{{old('perfil_nome')}}" />
            </div>

        </div>
        <div class="mt-4">
            <button type="submit" class="col-2 btn btn-semas me-2">Salvar</button>
            <a class="col-2 btn btn-secondary" href="{{route('perfil.index')}}">Voltar</a>
        </div>

    </form>
</div>
@endsection
