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
        <img src="{{ asset('img/icons/logo2.png') }}" alt="Logo" class="logo" style="height: 450px "> 
            <header class="codrops-header">
            </header>

            <div class="form">
                <form class="register-form" action="{{ route('login.registrar') }}" method="POST">
                    {{ csrf_field() }}
                    <h2><i class="message"></i> Cadastrar</h2>
                    <input type="text" name="nome" placeholder="Seu nome *" required/>
                    <input type="text" name="login" placeholder="Nome de Usuario *" required/>
                    <input type="email" name="email" placeholder="Email *" required/>
                    <input type="password" name="password" placeholder="Senha *" required/>
                    <input type="password" name="check_password" placeholder="Confirmar Senha *" required/>

                    <div style="display: flex; justify-content: center;">
                    <button type="submit">Criar</button>
                    </div>

                    <p class="message">Já registrado <a href="#" onclick="toggleForms()">Entrar</a></p>
                </form>
                <form class="login-form" action="{{ route('login.entrar') }}" method="post">
                    {{ csrf_field() }}
                    <h2><i class="message"></i> Login</h2>
                    <input type="text" name="login" placeholder="Nome de Usuario" required />
                    <input type="password" name="password" placeholder="Senha" required/>

                    @if ($errors->has('msg'))
                        <div class="">
                            {{ $errors->first('msg') }}
                        </div>
                    @endif
                    <div style="text-align: center;">
                    <button type="submit" name="send2" class="button">Entrar</button>
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