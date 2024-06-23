<div class="d-flex flex-column fixed-top" id="sidebar">
    <img id="sidebar-img" src="{{asset('images/sidebar-bg.png')}}">
    <div class="d-flex justify-content-between align-middle p-3 text-white">
        MENU
    </div>
    <ul class="nav nav-pills flex-column">
        {{-- <li>
            <a href="{{route('registro.index')}}" class="nav-link text-white align-middle">
                <i class="bi bi-file-earmark-check-fill"></i>
                <span>Registros</span></a>
        </li>

        <li>
            <a href="{{route('setor.index')}}" class="nav-link text-white align-middle">
                <i class="bi bi-archive-fill"></i>
                <span>Setores</span>
            </a>
        </li> --}}

        <li>
            <a href="{{route('user.index')}}" class="nav-link text-white align-middle">
                <i class="bi bi-people-fill"></i>
                <span>Usuários</span>
            </a>
        </li>

    </ul>
</div>
