@extends('app')
@section('content')
<div id="content-header">
    <i class="bi bi-wrench-adjustable me-1"></i>Nova Configuração
</div>

<div class="card m-4 px-4 py-4">
    @include('components.notification')
    <div>

        <form action="{{route('perfil.settings.store')}}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col">
                    <label for="rota_id">rota</label>
                    <select class="form-select" name="rota_id" id="rota_id">
                        @foreach ($rotas as $rota)
                            <option value="{{$rota->id}}">{{$rota->endpoint}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="perfil_id">Perfil</label>
                    <select class="form-select" name="perfil_id" id="perfil_id">
                        <option selected value="{{$perfil->id}}">{{$perfil->nome}}</option>
                    </select>
                </div>

                <div class="mt-4">
                    <div class="config-option">
                        <div>
                            <label class="form-check-label fw-bold fs-5" for="checkBox_create">create</label>
                            <p class="text-secondary">Permitir que o usuário crie novos registros</p>
                        </div>
                        <input hidden class="form-check-input" type="checkbox" id="checkBox_create" name="checkBox_create">
                        <div class="toggle-box">
                            <div></div>
                        </div>
                    </div>

                    <div class="config-option">
                        <div>
                            <label class="form-check-label fw-bold fs-5" for="checkBox_create">read</label>
                            <p class="text-secondary">Permitir que o usuário leia novos registros</p>
                        </div>
                        <input hidden class="form-check-input" type="checkbox" id="checkBox_read" name="checkBox_read">
                        <div class="toggle-box">
                            <div></div>
                        </div>
                    </div>

                    <div class="config-option">
                        <div>
                            <label class="form-check-label fw-bold fs-5" for="checkBox_create">update</label>
                            <p class="text-secondary">Permitir que o usuário edite novos registros</p>
                        </div>
                        <input hidden class="form-check-input" type="checkbox" id="checkBox_update" name="checkBox_update">
                        <div class="toggle-box">
                            <div></div>
                        </div>
                    </div>

                    <div class="config-option">
                        <div>
                            <label class="form-check-label fw-bold fs-5" for="checkBox_create">delete</label>
                            <p class="text-secondary">Permitir que o usuário exclua novos registros</p>
                        </div>
                        <input hidden class="form-check-input" type="checkbox" id="checkBox_delete" name="checkBox_delete">
                        <div class="toggle-box">
                            <div></div>
                        </div>
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
<script>

    $('.config-option').each(function() {
        var el = $(this);
        el.find('.toggle-box').on('click', function() {
            var checkbox = el.find('input');
            if(checkbox.prop('checked')){
                checkbox.prop("checked", false);
                $(this).removeClass('active');
            } else {
                checkbox.prop("checked", true);
                $(this).addClass('active');
            }
        })
    })

</script>
@endsection
