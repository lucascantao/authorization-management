<div class="d-flex flex-column fixed-top" id="sidebar">
    {{-- <img id="sidebar-img" src="{{asset('images/sidebar-bg.png')}}"> --}}
    <div class="d-flex justify-content-between align-middle p-3 text-white">
        MENU
    </div>
    <ul class="nav nav-pills flex-column">
        <li>
            <a href="{{route('perfil.index')}}" class="nav-link text-white align-middle">
                <i class="bi bi-person-fill-check"></i>
                <span>Perfis</span></a>
        </li>


        <li>
            <a href="{{route('rota.index')}}" class="nav-link text-white align-middle">
                <i class="bi bi-sign-turn-slight-right-fill"></i>
                <span>Rotas</span>
            </a>
        </li>

        <li>
            <a href="{{route('user.index')}}" class="nav-link text-white align-middle">
                <i class="bi bi-people-fill"></i>
                <span>Usuários</span>
            </a>
        </li>

    </ul>
</div>
