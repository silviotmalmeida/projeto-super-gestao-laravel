{{-- arquivo base do layout do site --}}
<!DOCTYPE html>
<html lang="pt-br">


<head>
    {{-- definindo o título da página --}}
    {{-- o título será composto de uma string fixa (Área Restrita) mais uma variável definida na view --}}
    <title>Área Restrita - @yield('title')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/base_style.css') }}">
</head>

<body>
    {{-- incluindo o menu superior --}}
    @include('app.layouts._partials._nav')

    {{-- inserindo o conteúdo definido na view --}}
    @yield('content')
</body>

</html>
