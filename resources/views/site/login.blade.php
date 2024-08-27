@extends('layout.site')
@section('titulo','VerificaAi')
@section('styles')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}" />
@endsection

@section('conteudo')
    <div class="content">
        <div class="login-page" id="home">
            <header class="codrops-header">
                <h1>Seja bem-vindo! <span></span></h1>
            </header>

            <div class="form">
                <form class="register-form" action="{{ route('login.registrar') }}" method="POST">
                    {{ csrf_field() }}
                    <h2><i class="fas fa-lock"></i> Cadastrar</h2>

                    <input type="text" name="name" placeholder="Primeiro Nome *" required/>
                    <input type="text" name="username" placeholder="Nome de Usuario *" required/>
                    <input type="email" name="email" placeholder="Email *" required/>
                    <input type="password" name="password" placeholder="Senha *" required/>
                    <input type="password" name="check_password" placeholder="Confirmar Senha *" required/>

                    <button type="submit">Criar</button>
                    <p class="message">Já registrado <a href="#" onclick="toggleForms()">Entrar</a></p>
                </form>

                <form class="login-form" action="{{ route('login.entrar') }}" method="post">
                    {{ csrf_field() }}
                    <h2><i class="fas fa-lock"></i> Login</h2>
                    <input type="text" name="username" placeholder="Nome de Usuario" required />
                    <input type="password" name="password" placeholder="Senha" required/>

                    @if ($errors->has('msg'))
                        <div class="">
                            {{ $errors->first('msg') }}
                        </div>
                    @endif

                    <button type="submit" name="send2" class="button">Entrar</button>

                    <form action="google" method="post">
                        <div class="row" style="margin-top: 15px;">
                            <div>
                                <div class="col-12 center">
                                    <div class="col-12 center">
                                        <button class="continue1">
                                            <img src="{{ asset('img/icons/google.png') }}" style="margin-right: 10px; padding-left: 10px; width: 20px; height: 20px;">
                                            Continue com Google
                                        </button>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <p class="message">Não cadastrado? <a href="#" onclick="toggleForms()">Criar uma conta</a></p>
                    </form>
                </form>
            </div>
            <br>
            <br>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/toggleForms.js') }}"></script>
@endsection