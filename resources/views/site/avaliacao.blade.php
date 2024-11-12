@extends('layout.site')
@section('titulo','Verifica AI')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu_topside.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('conteudo')
    <div class="box">
        <div class="content">
            <div class="star">
                <img src="{{ asset('img/icon-star.svg') }}" alt="icon-star">
            </div>
            <div class="text-01">
                <p class="title">Avalie sua experiência no nosso site!</p>
                <p class="txt">Deixe seu feedback para ajudar a melhorar<br> sua experiência conosco!</p>
            </div>
            <!-- Estrelas Flutuantes para Avaliação -->
            <div class="rating">
                @for ($i = 1; $i <= 5; $i++)
                    <button class="star-btn" data-rating="{{ $i }}">&#9733;</button>
                @endfor
            </div>
            <div class="button">
                <button id="submit-rating" class="btn" type="button">Enviar</button>
            </div>
        </div>
    </div>

    <!-- Caixa de Agradecimento -->
    <div class="thanks-box" style="display: none;">
        <img class="img-thanks" src="{{ asset('img/illustration-thank-you.svg') }}" alt="thank-you">
        <div class="text-02">
            <p class="title">Obrigado(a)!</p>
            <p class="txt txt-center">Obrigado(a) por dedicar seu tempo para nos avaliar!<br>Estamos sempre à disposição para ajudar.</p>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/rating.js') }}"></script>
@endsection
