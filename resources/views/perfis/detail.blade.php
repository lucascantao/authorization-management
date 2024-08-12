@extends('app')
@section('content')
<div id="content-header">
    <i class="bi bi-gear-fill"></i>
    Detalhes da Rota
</div>

<div class="card m-4 px-4 py-4">
    <div>
        <label class="form-label"><h1><b>Perfil: {{ $perfil->nome }}</b></h1></label>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6 col-md-4">
            <label class="form-label"><b>Endpoint:</b></label><br>
            {{-- <label class="form-label"><i>/{{ $rota->endpoint }}</i></label> --}}
        </div>
    </div>

    <hr>

    <div>

        @foreach($perfil->rotas as $rota)

            <div class="d-flex justify-content-between permission-item">
                <div>
                    <span><i class="bi bi-person-fill-gear"></i></span>
                    {{$rota->endpoint}}
                </div>
                <div>
                    @if($rota->pivot->create) <span style="color: greenyellow">C</span> @else <span style="color: red">C</span> @endif
                    @if($rota->pivot->read) <span style="color: greenyellow">R</span> @else <span style="color: red">R</span> @endif
                    @if($rota->pivot->update) <span style="color: greenyellow">U</span> @else <span style="color: red">U</span> @endif
                    @if($rota->pivot->delete) <span style="color: greenyellow">D</span> @else <span style="color: red">D</span> @endif
                    <a class="btn btn-opaque-semas me-1" href="{{route('rota.settings.edit', ['rota_id' => $rota->id, 'perfil_id' => $perfil->id])}}"><i class="bi bi-gear-fill"></i></a>
                </div>
            </div>

        @endforeach

    </div>

    <hr>

    <div class="d-flex justify-content-center">
        <a class="col-lg-2 btn btn-semas mb-2" href="{{route('perfil.settings.create', ['id' => $perfil->id])}}" role="button">Nova configuração <i class="bi bi-wrench-adjustable"></i></a>
    </div>

    <div class="mt-4">
        <a class="col-2 btn btn-secondary" href="{{route('perfil.index')}}">Voltar</a>
    </div>

</div>
@endsection
