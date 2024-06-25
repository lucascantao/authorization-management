@extends('app')
@section('content')
<div id="content-header">
    <i class="bi bi-sign-turn-slight-right-fill"></i>
    Rotas >
    <i class="bi bi-gear-fill"></i>
    Configurações > .../{{$rota->endpoint}}
</div>

<div class="card m-4 px-4 py-4">
    <div>
        <label class="form-label"><h1><b>Rota: /{{ $rota->endpoint }}</b></h1></label>
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

        <div class="d-flex justify-content-between permission-item">
            <div>
                <span><i class="bi bi-person-fill-gear"></i></span>
                {{$perfil->nome}}
            </div>
            <div>
                @if($perfil->pivot->create) <span style="color: greenyellow">C</span> @else <span style="color: red">C</span> @endif
                @if($perfil->pivot->read) <span style="color: greenyellow">R</span> @else <span style="color: red">R</span> @endif
                @if($perfil->pivot->update) <span style="color: greenyellow">U</span> @else <span style="color: red">U</span> @endif
                @if($perfil->pivot->delete) <span style="color: greenyellow">D</span> @else <span style="color: red">D</span> @endif
            </div>
        </div>

        @endforeach

    </div>

    <hr>

    <div class="d-flex justify-content-center">
        <a class="col-lg-2 btn btn-semas mb-2" href="{{route('rota.settings.create', ['id' => $rota->id])}}" role="button"><i class="bi bi-plus-circle"></i> Nova configuração</a>
    </div>

    <div class="mt-4">
        <a class="col-2 btn btn-secondary" href="{{route('rota.index')}}">Voltar</a>
    </div>

</div>
@endsection
