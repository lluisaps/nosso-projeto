@extends('layout.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <!-- Logo e Nome -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('img/icons/logo.png') }}" alt="Logo" style="height: 68px;">
        </a>

        <!-- Botão de Menu Responsivo -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: white;"></span>
        </button>

        <!-- Links de Navegação -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.home') }}">
                        <img src="{{ asset('img/icons/casa.png') }}" alt="Home" style="height: 24px;">
                        <span class="ms-2" style="color: white;">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('site.doc') }}">
                        <img src="{{ asset('img/icons/documento.png') }}" alt="Documentos" style="height: 24px;">
                        <span class="ms-2" style="color: white;">Documentos</span>
                    </a>
                </li>
                @if(Auth::check() && Auth::user()->admin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.usuarios.index') }}">
                            <img src="{{ asset('img/icons/documento.png') }}" alt="Crud" style="height: 24px;">
                            <span class="ms-2" style="color: white;">Crud</span>
                        </a>
                    </li>
                @endif
                @if(Auth::user())
                <li class="nav-start nav-link">
                    <div class="avatar-wrap">
                        @if(Auth::user()->foto_perfil)
                            <img class="avatar" id="open-button" src="data:image/jpeg;base64,{{ base64_encode(Auth::user()->foto_perfil) }}" alt="Foto de perfil" height="24px">
                        @else
                            <img id="open-button" src="{{ asset('img/icons/perfil2.png') }}" alt="Avatar" class="avatar" height="24px">
                            <span class="ms-2" style="color: white;">Perfil</span>
                        @endif
                        <nav class="menu-side">
                            <a href="{{ route('site.perfil') }}">Meu Perfil</a>
                            <a href="{{ route('site.home') }}">Home</a>
                            <a href="{{ route('site.doc') }}">Ler Documentos</a>
                            <a href="{{ route('login.sair') }}">Sair</a>
                        </nav>
                    </div>
                </li>
                @elseif(Auth::guest())
                 <li class="nav-start nav-link"><a style="text-decoration:none; color:white;" href="{{ route('site.login') }}">Fazer Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-custom {
        background-color: #2652a9; /* Cor de fundo azul */
    }

    .navbar-nav .nav-link {
        color: white;
        font-family: 'Verdana', sans-serif;
    }

    .navbar-toggler {
        border-color: white;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.7%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    /* Estilização do Dropdown */
    .dropdown-menu {
        background-color: #2652a9; /* Fundo azul */
        border: none; /* Remover borda */
        display: none; /* Escondido inicialmente */
    }

    .dropdown-menu .dropdown-item {
        color: white; /* Cor do texto */
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #1d3c7a; /* Azul mais escuro no hover */
        color: #8cb1e5; /* Cor do texto no hover */
    }

    /* Exibir o dropdown ao passar o mouse */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        transition: all 0.3s ease;
    }

    /* Garantir que o botão de dropdown não fique clicável */
    .nav-item.dropdown > a {
        cursor: pointer;
    }

    /* Avatar no dropdown */
    .avatar {
        border-radius: 50%;
        margin-right: 8px;
    }
    
</style>
@endsection
