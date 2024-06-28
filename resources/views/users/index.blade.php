@extends('app')
@section('content')
<div id="content-header">
    <i class="bi bi-people-fill"></i>
    Usuarios
</div>

{{-- <div class="card border-0 m-4 px-6 py-6">
    <div class="card-body">
        <span><i class="bi bi-search me-2"></i></span>Pesquisar user
        <hr>
        <div id="filtro" class="row">
            <div class="col-lg-3 col-md-4">
                <label class="form-label" for="status_user">Status</label>
                <select class="form-select" name="status_user" id="status_user">
                    <option value="">Todos</option>
                    <option selected value="registrado">Registrado</option>
                    <option value="excluido">Excluído</option>
                </select>
            </div>

            @if(Auth::user()->perfil_id==3)
            <div class="col-lg-3 col-md-4 col-sm-12">
                <label class="form-label" for="usuario_user">Usuário</label>
                <select class="form-control" name="usuario_user" id="usuario_user">
                    <option selected value="">Todos</option>
                    @foreach ($users as $usuario)
                        <option value="{{$usuario->name}}">{{$usuario->name}}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="col-lg-3 col-md-4 col-sm-12">
                <label class="form-label" for="usuario_user">Usuário</label>
                <select class="form-control" name="usuario_user" id="usuario_user">
                    <option selected value="">Todos</option>
                    @foreach ($users as $usuario)
                    @if(Auth::user()->setor_id==$usuario->setor_id)
                        <option value="{{$usuario->name}}">{{$usuario->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            @endif

            <div>
                <button id="button_clear" class="col-lg-2 btn btn-outline-semas mt-4"><i class="bi bi-eraser"></i> Limpar</button>
            </div>
        </div>
    </div>
</div> --}}

<div class="card border-0 card-body m-4 px-6 py-6">

    @include('components.notification')

    <span>Relação de Usuarios</span>
    <hr>
    <div>
        {{-- <a class="col-lg-2 btn btn-semas mb-2" href="{{route('user.index')}}" role="button"><i class="bi bi-plus-circle"></i> Cadastrar</a> --}}
        {{-- <button class="col-lg-2 btn btn-semas-secondary mb-2" id="botaoImprimir"><i class="bi bi-file-earmark-ruled me-2"></i>Gerar relatório</button> --}}
    </div>
    <div class="table-container">
        <table id="user_table" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-center col-1">Id</th>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Perfil</th>
                    <th scope="col" class="text-center col-1" >Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="text-center">{{$user->id}}</td>
                    <td class="text-center">{{$user->name}}</td>
                    @if($user->perfil != null)
                        <td class="text-center">{{$user->perfil->nome}}</td>
                    @else
                        <td class="text-center">Sem perfil</td>
                    @endif
                    <td class="text-center" style="white-space: nowrap !important">
                        <a class="btn btn-opaque-semas me-1" href="{{route('user.edit', ['id' => $user->id])}}"><span><i class="bi bi-pencil-fill"></i></span></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- @include('users.responsive.list') --}}
</div>

<!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css">
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>

<!-- Print -->
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>


<!-- DataTables da Usuario -->
<script>

    // TABELA PORTARIA
    var user_table = $('#user_table').DataTable({

        order: [
            [0, 'desc']
        ],
        // Tradução
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.0.3/i18n/pt-BR.json',
        },
        columnDefs: [
            // {target: 0, visible: true},
            // {target: 2, visible: false, searchable: true},
            // {target: 6, visible: false, searchable: true},
            // {target: 7, orderable: false},
            // {target: 5, orderable: false}
        ],
        layout: {
            topEnd: {
                pageLength: {
                    menu: [5, 10, 25, 50]
                }
            },
        },
    });

    // $(document).ready(function () {
    //   $('#usuario_user').selectize({
    //       sortField: 'text'
    //   });
    // });

    // $('#usuario_user').on('change', function() {
    //     user_table.column(1).search(this.value).draw();
    // });

    // $('#status_user').on('change', function() {
    //     user_table.column(4).search(this.value).draw();
    // });

    // //reseta valore dos input e o filtro das datas
    // $('#button_clear').on('click', function() {


    //     $('#filtro select').each( function () {
    //         $(this).val($(this).find('option[selected]').val());
    //     });

    //     $('#filtro input').each(function() {
    //         $(this).val('');
    //     });

    //     user_table.search('').columns().search('').draw();
    //     user_table.column(4).search('Registrado').draw();
    // });

    // $('#botaoImprimir').on('click', function() {
    //     //Acionar o botão deGerar relatório do datatables
    //     user_table.button('.buttons-print').trigger();
    // });

    // user_table.column(4).search('Registrado').draw();
</script>
@endsection
