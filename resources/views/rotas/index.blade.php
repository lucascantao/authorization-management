@extends('app')
@section('content')

<div id="content-header">
    <i class="bi bi-sign-turn-slight-right-fill"></i>
    Rotas
</div>

<div class="card border-0 card-body m-4 px-6 py-6">

    {{-- @include('components.notification') --}}

    <span>Relação Rotas</span>
    <hr>
    <div>
        {{-- <a class="col-lg-2 btn btn-semas mb-2" href="{{route('rota.index')}}" role="button"><i class="bi bi-plus-circle"></i> Cadastrar</a> --}}
        {{-- <button class="col-lg-2 btn btn-semas-secondary mb-2" id="botaoImprimir"><i class="bi bi-file-earmark-ruled me-2"></i>Gerar relatório</button> --}}
    </div>
    <div class="table-container">
        <table id="rota_table" class="table table-hover">
            <thead>
                <tr>
                    {{-- <th scope="col" class="text-center col-1">Id</th> --}}
                    <th scope="col">Endpoint</th>
                    <th scope="col" class="text-center col-1" >Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rotas as $rota)
                <tr>
                    {{-- <td class="text-center">{{$rota->id}}</td> --}}
                    <td style="font-style: italic"><span style="color: rgba(70, 70, 70, 0.459)">https://...</span>/{{$rota->endpoint}}</td>
                    <td class="text-center" style="white-space: nowrap !important">
                        <a class="btn btn-opaque-semas me-1" href="{{route('rota.settings', ['id' => $rota->id])}}"><span><i class="bi bi-wrench-adjustable"></i></span></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- @include('rotas.responsive.list') --}}
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
    var rota_table = $('#rota_table').DataTable({

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
    //   $('#usuario_rota').selectize({
    //       sortField: 'text'
    //   });
    // });

    // $('#usuario_rota').on('change', function() {
    //     rota_table.column(1).search(this.value).draw();
    // });

    // $('#status_rota').on('change', function() {
    //     rota_table.column(4).search(this.value).draw();
    // });

    // //reseta valore dos input e o filtro das datas
    // $('#button_clear').on('click', function() {


    //     $('#filtro select').each( function () {
    //         $(this).val($(this).find('option[selected]').val());
    //     });

    //     $('#filtro input').each(function() {
    //         $(this).val('');
    //     });

    //     rota_table.search('').columns().search('').draw();
    //     rota_table.column(4).search('Registrado').draw();
    // });

    // $('#botaoImprimir').on('click', function() {
    //     //Acionar o botão deGerar relatório do datatables
    //     rota_table.button('.buttons-print').trigger();
    // });

    // rota_table.column(4).search('Registrado').draw();
</script>
@endsection
