@extends('layout.site')
@section('titulo','Home')
@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
@endsection

@section('conteudo')
    <div class="content">
        <a id="seta"></a>
        <header class="codrops-header">
            <h1>Ei, separa um tempo e Avalia AI! <span></span></h1>
        </header>
        <section class="related">
            <p>A criação desse modelo foi muito importante para nós:</p>
            <li style="align-items:left;">Somos uma equipe de TCC e visamos entregar nosso projeto para concluir o curso de informática do CTI. 
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
@endsection