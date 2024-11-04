@extends('layout.site')
@section('titulo', 'Perfil')

@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/doc.css') }}">
@endsection

@section('conteudo')
    <div style="background-color:#202c4c">
        <a id="seta"></a>
        <br>
        <div class="perfil">
            <form action="{{ route('site.atualizarFoto') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="foto-perfil">
                    @if(Auth::user()->foto_perfil)
                        <img src="{{ asset(Auth::user()->foto_perfil) }}" alt="Foto de perfil" style="width:200px">
                    @else
                        <img src="{{ asset('img/icons/avatar128.png') }}" alt="Imagem padrão" style="width:200px">
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
                        <img src="{{ asset('img/icons/avatar.png') }}">
                        <p>&ensp; Nome: {{ Auth::user()->nome }}</p>
                    </div>
                    <div class="perfil-imgs">
                        <img src="{{ asset('img/icons/email.png') }}">
                        <p class="p">&ensp; Email: {{ Auth::user()->email }}</p>
                    </div>
                    <div class="perfil-imgs">
                        <img src="{{ asset('img/icons/telefone.png') }}">
                        <p>&ensp; Telefone: {{ Auth::user()->telefone ?? 'Não informado' }}</p>
                    </div>
                </div>
                <form action="{{ route('login.sair') }}" method="GET">
                    {{ csrf_field() }}
                    <button type="submit" class="btn-logout">Sair</button>
                </form>
            </div>
        </div>
        <br>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
@endsection