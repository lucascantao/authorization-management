@extends('app')
@section('content')
<div id="content-header">
    <i class="bi bi-sign-turn-slight-right-fill"></i>
    <a href="{{route('rota.index')}}">Rotas</a> >
    <a href="{{route('rota.settings', ['id' => $rota->id])}}">/{{$rota->endpoint}}</a>[ perfil={{$perfil->nome}}</a> ] >
    <i class="bi bi-wrench-adjustable me-1"></i>Editar Configuração
</div>

<div class="card m-4 px-4 py-4">
    @include('components.notification')
    <div>

        <form action="{{route('rota.settings.update', ['id' => $rota->id])}}" method="PUT">
            @csrf

            <div class="row mb-3">
                <div class="col">
                    <label for="rota_id">rota</label>
                    <input hidden name="rota_id" id="rota_id" value="{{$rota->id}}">
                    <input class="form-control" value="{{$rota->endpoint}}" readonly>
                </div>

                <div class="col">
                    <label for="perfil_id">Perfil</label>
                    <input hidden name="perfil_id" id="perfil_id" value="{{$perfil->id}}">
                    <input class="form-control" value="{{$perfil->nome}}" readonly>
                </div>

                <div class="mt-4">
                    <div>
                        <input class="form-check-input" type="checkbox" id="checkBox_create" name="checkBox_create">
                        <label class="form-check-label" for="checkBox_create">create</label>
                    </div>
                    <div>
                        <input class="form-check-input" type="checkbox" id="checkBox_read" name="checkBox_read">
                        <label class="form-check-label" for="checkBox_read">read</label>
                    </div>
                    <div>
                        <input class="form-check-input" type="checkbox" id="checkBox_update" name="checkBox_update">
                        <label class="form-check-label" for="checkBox_update">update</label>
                    </div>
                    <div>
                        <input class="form-check-input" type="checkbox" id="checkBox_delete" name="checkBox_delete">
                        <label class="form-check-label" for="checkBox_delete">delete</label>
                    </div>
                </div>

            </div>
            <div class="mt-4">
                <button type="submit" class="col-2 btn btn-semas me-2">Salvar</button>
                <a class="col-2 btn btn-secondary" href="{{route('rota.settings', ['id' => $rota->id])}}">Voltar</a>
            </div>

        </form>

    </div>



</div>
@endsection
