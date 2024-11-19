@extends('layout.site')
@section('titulo','Verifica AI')
@section('styles')
    <link rel="shortcut icon" href="{{ asset('img/icons/logoMundo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/doc.css') }}">
    <script src="{{ asset('js/botaodoc.js') }}"></script> 
@endsection 

@section('conteudo')
<div class="content mt-5" style="margin-bottom: 15em">
    <header class="codrops-header text-center" style="margin-bottom: 19em;">
        <h1>Adicione seu arquivo abaixo</h1>
        <p class="mt-3">A leitura da IA pode demorar algum tempo.</p>
    </header>

    <div class="row justify-content-center mt-5">
        <div class="col-md-4 text-center">
            <!-- Botão para escolher arquivo da galeria -->
            <form action="{{ route('site.upload') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf
                <label for="file-upload" class="button">Escolher Imagem</label>
                <input id="file-upload" type="file" name="image" accept="image/*" style="display:none;" onchange="this.form.submit()">
            </form>
        </div>
            <div class="col-md-4 text-center">
            <!-- Botão para capturar foto com a câmera -->
            <form action="{{ route('site.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="camera-upload" class="button">Tirar Foto</label>
                <input id="camera-upload" type="file" name="image" accept="image/*" capture="camera" style="display:none;" onchange="this.form.submit()">
            </form>
        </div>
    </div>


            <!-- Exibe os erros de validação -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </header>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
@endsection