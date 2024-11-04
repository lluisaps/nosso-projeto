@extends('layout.site')
@section('titulo','Home')
@section('styles')
   
  
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}"/>
    <link rel="stylesheet" href="style.css">
@endsection

@section('conteudo')
        <div class="box">
            <div class="content">
                <div class="star">
                    <img src="img/icon-star.svg" alt="icon-star">
                </div>
                <div class="text-01" >
                    <p class="title">Aproveita e Avalia AI a sua experiência no nosso site!</p>
                    <p class="txt">Nos deixe saber como te auxiliamos<br> Todo o feedback é necessário<br>para melhorar sua experiência!</p>
                </div>
                <div class="number">
                    <button class="circle" type="submit">1</button>
                    <button class="circle" type="submit">2</button>
                    <button class="circle" type="submit">3</button>
                    <button class="circle" type="submit">4</button>
                    <button class="circle" type="submit">5</button>
                </div>
                <div class="button">
                    <button class="btn" type="submit">Enviar</button>
                </div>
            </div>
        </div>
        <div class="thanks-box-flip">
            <img class="img-thanks" src="img/illustration-thank-you.svg" alt="thank-you">
            <div class="select-box">
                <p id="select-txt"></p>
            </div>
            <div class="text-02">
                <p class="title" >Obrigado(a)!</p>
                <p class="txt txt-center" >Obrigado(a) por dedicar seu tempo para nos avaliar<br>Caso precise de suporte não deixe de entrar em contato!<br</p>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="script.js"></script>
@endsection
