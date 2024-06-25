@extends('app')
@section('content')
<div id="content-header">
    <i class="bi bi-clipboard-fill"></i>
    Detalhes da Rota
</div>

<div class="card m-4 px-4 py-4">
    <div>
        <label class="form-label"><h1><b>Rota: {{ $rota->id }}</b></h1></label>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6 col-md-4">
            <label class="form-label"><b>Endpoint:</b></label><br>
            <label class="form-label"><i>/{{ $rota->endpoint }}</i></label>
        </div>
    </div>

    <hr>

    <div>

        @foreach($rota->perfis as $perfil)

        <div>
            {{$perfil->nome}}
            {{$perfil->pivot->create}}
            {{$perfil->pivot->read}}
            {{$perfil->pivot->update}}
            {{$perfil->pivot->delete}}
        </div>

        @endforeach

    </div>

    <hr>

    <div class="mt-4">
        <a class="col-2 btn btn-secondary" href="{{route('rota.index')}}">Voltar</a>
    </div>
    
</div>
@endsection