<!DOCTYPE html>
<html lang="en" class="no-js">    
    <head>
        <title>@yield('titulo')</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
        @yield('styles')

    </head>
    <body>
        <!-- <div class="container"> -->
            @include('layout._cabecalho')
            
            <div class="content-wrap">
                @yield('conteudo')
                @include('layout._rodape')
            </div>

            
        <!-- </div>     -->
        @yield('scripts')
    </body>
</html>

