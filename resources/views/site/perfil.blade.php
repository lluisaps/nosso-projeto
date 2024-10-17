@extends('layout.site')
@section('titulo', 'Perfil')

@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/doc.css') }}">
    
    <style>
        /* Estilizando o vídeo de fundo para cobrir toda a tela */
        .background-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Faz o vídeo cobrir toda a tela */
            z-index: -1;
        }

        /* Estilizando a área do perfil */
        .perfil-container {
            background-color: rgba(255, 255, 255, 0.8); /* Fundo semi-transparente */
            border: 5px solid red; /* Contorno vermelho */
            padding: 20px; /* Espaço interno */
            margin-top: 100px; /* Distância do topo da página */
            margin-bottom: 100px; /* Espaçamento em relação ao rodapé */
            width: 80%; /* Largura relativa para garantir responsividade */
            max-width: 600px; /* Largura máxima */
            margin-left: auto;
            margin-right: auto;
        }

        /* Tornar os elementos internos responsivos */
        .perfil-imgs img {
            max-width: 100px;
            width: 100%;
            height: auto;
        }

        .p {
            font-size: 1.2em;
        }

        /* Ajustando botão de logout */
        .btn-logout {
            display: block;
            width: 100%;
            margin-top: 20px;
        }

        /* Centralizando e espaçando */
        .perfil-page {
            text-align: center;
        }
    </style>
@endsection

@section('conteudo')
    <!-- Vídeo de fundo -->
    <video autoplay muted loop class="background-video">
        <source src="{{ asset('video/background.mp4') }}" type="video/mp4">
    </video>

    <div>
        <br><br><br>
        <!-- Área do perfil com contorno e preenchimento -->
        <div class="perfil-container">
            <div class="perfil">
                <form action="{{ route('site.atualizarFoto') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label for="foto-perfil">
                        @if(Auth::user()->foto_perfil)
                            <img src="{{ asset('img/fotoPerfil/foto_perfil_' + Auth::user()->id_usuario) }}" alt="Foto de perfil">
                            <p style="font-family: 'Verdana', sans-serif;">&ensp;{{ Auth::user()->nome }}</p>
                        @else
                            <img src="{{ asset('img/icons/avatar128.png') }}" alt="Imagem padrão" class="img-fluid" style="width: 100px;">
                            <p style="font-family: 'Verdana', sans-serif; font-size: 25px;">&ensp;{{ Auth::user()->nome }}</p>
                        @endif
                    </label>
                    <input type="file" id="foto-perfil" name="foto_perfil" accept="image/*" style="display: none;" onchange="this.form.submit()">
                </form>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <h1>{{ Auth::user()->name}}</h1>
            </div>

            <div class="perfil-page">
                <div class="perfil-mostrar">
                    <div class="perfil-fotos">
                        <div class="perfil-imgs">
                            <img src="{{ asset('img/icons/avatar.png') }}" class="img-fluid">
                            <p class="p">&ensp; Nome: {{ Auth::user()->nome }}</p>
                        </div>
                        <div class="perfil-imgs">
                            <img src="{{ asset('img/icons/email.png') }}" class="img-fluid">
                            <p class="p">&ensp; Email: {{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <form action="{{ route('login.sair') }}" method="GET">
                        {{ csrf_field() }}
                        <button type="submit" class="btn-logout btn btn-primary">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/classie.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
