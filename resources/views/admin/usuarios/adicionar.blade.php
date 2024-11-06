@extends('layout.site')
@section('titulo','Cursos')

@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
@endsection

@section('conteudo')
    <div class="container" style="background-color:white">
        <br><br><br>
        <h3 class="center">Adicionar Usuário</h3>
        <div class="row center">
            <form class="" action="{{route('admin.usuarios.salvar')}}" 
                    method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.usuarios._form')

                <!-- coloca css no alerta luisa (esses ai n existe) -->
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <button class="button_crud center">Salvar</button>
            </form>
        </div>
    </div>
@endsection