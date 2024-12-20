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
    <div class="container" style="background-color: white;">
        <h3 class="center">Editado Usuario</h3>
        <div class="row">
            <form class="" action="{{ route('admin.usuarios.atualizar', $linha->id)}}"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('admin.usuarios._form')

                <!-- coloca css no alerta luisa (esses ai n existe) -->
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <button class="btn light-blue">Atualizar</button>
            </form>
        </div>
    </div>
@endsection