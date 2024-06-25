<nav class="navbar navbar-expand-lg sticky-top py-3 border border-b-2">
    {{-- <img id="nav-img" src="{{asset('images/header-bg.png')}}"> --}}
    <div class="d-flex justify-content-between align-items-center w-100">
        <span id="logo" ><a href="/"><img src="{{asset('images/logo.png')}}" height="64px" alt="" style="color: white"></a></span>
        <span id="titulo" class="fs-5 text-white" style="font-weight: bold"><span  style="color: #ff5f29; margin-right: 2px; font-style: italic">Auth</span>orization Management <i style="color: #ff5f29" class="bi bi-shield-lock-fill"></i></span>
        <div id="funcoes" class="me-3">
            {{-- <span 
            class="text-warning border border-warning px-2 me-2"
            style="font-size: 14px;"
            >{{Auth::user()->perfil->nome}}</span> --}}
            <a id="profile-edit" class="btn btn-opaque-semas-light" href="{{route('profile.edit')}}">
                <div class="d-flex align-items-center justify-content-between">
                    <i class="bi bi-person-circle me-3"></i>
                    <span style="font-size: 14px;">{{ Auth::user()->name }}</span>
                </div>
            </a>
            <a id="logout" class="btn btn-light px-lg-4 ms-2" href="{{route('logout')}}"><i class="bi bi-box-arrow-right me-2"></i><span>Sair</span></a>
        </div>
    </div>
</nav>