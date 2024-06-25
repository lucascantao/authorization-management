@extends('app')
@section('title', 'usuarios')
@section('content')

<div class="bg-white p-1">
    <i class="bi bi-people-fill"></i>
    Editar Usuário
</div>

<div class="card border-0 card-body m-4 px-6 py-6">
    Informações de Usuário
    <hr>
    <form action="{{route('user.update', ['id' => $user->id])}}" method="POST">
        @csrf
        @method('put')
        <div class="row row-cos-6">
            <div class="col-6">
                <label for="usuario_nome" class="form-label">Nome</label>
                <input id="usuario_nome" type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="col-6">
                <label for="usuario_perfil" class="form-label">Perfil</label>
                <select id="usuario_perfil" class="form-select" name="perfil_id">
                    <option selected hidden value="null">Selecionar pefil</option>
                    @foreach ($perfis as $perfil)
                    @if ($perfil->id == $user->perfil_id)
                        <option selected name="{{$perfil->nome}}" value="{{$perfil->id}}" id="">{{$perfil->nome}}</option>
                    @else
                        <option name="{{$perfil->nome}}" value="{{$perfil->id}}" id="">{{$perfil->nome}}</option>
                    @endif

                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="usuario_email" class="form-label">Email</label>
                <input id="usuario_email" type="text" name="email" class="form-control" value="{{$user->email}}">
            </div>
        </div>
        <div class="d-flex mt-4">
            <button class="col-2 btn btn-semas me-1" type="submit">Salvar usuário</button>
        </div>
    </form>

</div>

<script>

</script>
@endsection
