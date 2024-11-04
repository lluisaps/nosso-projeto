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
@endsection

@section('conteudo')
<div class="content">
    <br>
    <h3 class='center'>Lista de Usuarios</h3>

    <div class='row' style="background-color: white;">
        <table class="highlight responsive-table">
            <thead class="cabecalho-tabela">
                <tr> <!-- CABECALHO -->
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Login</td>
                    <td>Email</td>
                    <td>Senha</td>
                    <td>Foto de Perfil</td>
                    <td>Email Verificado</td>
                    <td>Admin</td>
                    <td>Criado em</td>
                    <td>Atualizado em</td>
                    <td>Email Verificado em</td>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row) <!-- LOOP PRA LER A TABELA -->
                <tr>
                    <td>{{ $row->id_usuario }}</td>
                    <td>{{ $row->nome }}</td>
                    <td>{{ $row->login }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->password }}</td>

                    @if($row->foto_perfil)
                        <td><img src="{{ asset('img/fotoPerfil/foto_perfil_' + $row->id_usuario) }}" alt="Foto de perfil"></td>
                    @else
                        <td><img src="{{ asset('img/icons/avatar128.png') }}" alt="Imagem padrão"></td>
                    @endif

                    @if ($row->email_verificado == true)
                        <td>Sim</td>
                    @else
                        <td>Não</td>
                    @endif

                    @if ($row->admin == true)
                        <td>Sim</td>
                    @else
                        <td>Não</td>
                    @endif
                    <td>{{ $row->data_criacao }}</td>
                    <td>{{ $row->data_edicao }}</td>
                    <td>{{ $row->data_verificacao }}</td>
                    <td><a class='btn-alterar' href="{{ route('admin.usuarios.editar',$row->id) }}">Alterar</a></td>
                    <td><a class='btn-excluir' href="{{ route('admin.usuarios.excluir',$row->id) }}">Excluir</a></td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class='row'> <!-- BOTAO ADICIONAR -->
            <a class='btn-adicionar' href="{{ route('admin.usuarios.adicionar')}}">Adicionar</a>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
@endsection