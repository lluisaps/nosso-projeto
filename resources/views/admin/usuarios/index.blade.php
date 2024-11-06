@extends('layout.site')
@section('titulo','Cursos')
@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('conteudo')
<div class="content">
    <br>
    <h3 style="text-align: center;">Lista de Usuários</h3>
    <br>

    <div class="row bg-primary text-white font-weight-bold py-2 text-center">
        <div class="col-md-1">Id</div>
        <div class="col-md-1">Nome</div>
        <div class="col-md-1">Login</div>
        <div class="col-md-2">Email</div>
        <div class="col-md-1">Senha</div>
        <div class="col-md-1">Foto</div>
        <div class="col-md-1">Verificado</div>
        <div class="col-md-1">Admin</div>
        <div class="col-md-1">Criado em</div>
        <div class="col-md-1">Atualizado em</div>
        <div class="col-md-1">Ações</div>
    </div>

    @foreach($rows as $row)
    <div class="row text-center align-items-center border-bottom py-2">
        <div class="col-md-1">{{ $row->id }}</div>
        <div class="col-md-1">{{ $row->nome }}</div>
        <div class="col-md-1">{{ $row->login }}</div>
        <div class="col-md-2">{{ $row->email }}</div>
        <div class="col-md-1">{{ Str::limit($row->password, 8, '...') }}</div>

        <div class="col-md-1">
            @if($row->foto_perfil)
                <img src="{{ asset('img/fotoPerfil/foto_perfil_' . $row->id . '.jpg') }}" alt="Foto de perfil" width="30">
            @else
                <img src="{{ asset('img/icons/avatar128.png') }}" alt="Imagem padrão" width="30">
            @endif
        </div>

        <div class="col-md-1">{{ $row->email_verificado ? 'Sim' : 'Não' }}</div>
        <div class="col-md-1">{{ $row->admin ? 'Sim' : 'Não' }}</div>
        <div class="col-md-1">{{ \Carbon\Carbon::parse($row->data_criacao)->format('d/m/Y H:i') }}</div>
        <div class="col-md-1">{{ \Carbon\Carbon::parse($row->data_edicao)->format('d/m/Y H:i') }}</div>
        
        <div class="col-md-1">
            <a class="btn btn-sm btn-primary" style="margin-bottom: 1em;" href="{{ route('admin.usuarios.editar', $row->id) }}">Alterar</a>
            <a class="btn btn-sm btn-danger" href="{{ route('admin.usuarios.excluir', $row->id) }}">Excluir</a>
        </div>
    </div>
    @endforeach

    <div class="row mt-3">
        <a class="btn btn-success" style="margin-bottom: 1em;" href="{{ route('admin.usuarios.adicionar') }}">Adicionar</a>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/classie.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
