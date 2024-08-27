@extends('layout.site')
@section('titulo','Cursos')

@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
@endsection

@section('conteudo')
<div class='content'>
    <br>
    <h3 class='center'>Lista de Usuarios</h3>

    <div class='row' style="background-color: white;">
        <table>
            <thead>
                <tr> <!-- CABECALHO -->
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Email Verificado em</td>
                    <td>Senha</td>
                    <td>Foto de Perfil</td>
                    <td>Remember_token</td>
                    <td>Criado em</td>
                    <td>Atualizado em</td>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row) <!-- LOOP PRA LER A TABELA -->
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->username }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->email_verified_at }}</td>
                    <td>{{ $row->password }}</td>
                    <td><img src="data:image/jpeg;base64,{{ base64_encode( $row->foto_perfil) }}" width="150" alt="Vazio"></td>
                    <td>{{ $row->remember_token }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>{{ $row->updated_at }}</td>
                    <td></td>
                    <td> <!-- COLUNA COM ALTERAR E EXCLUIR -->
                        <a class='btn light-blue'
                            href="{{ route('admin.usuarios.editar',$row->id) }}">Alterar</a>
                        <a class='btn red'
                            href="{{ route('admin.usuarios.excluir',$row->id) }}">Excluir</a>
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class='row'> <!-- BOTAO ADICIONAR -->
            <a class='btn blue' href="{{ route('admin.usuarios.adicionar')}}">Adicionar</a>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
@endsection