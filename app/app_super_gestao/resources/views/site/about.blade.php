{{-- extende do arquivo base de layout --}}
@extends('site.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Sobre nós')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Olá, eu sou o Super Gestão</h1>
        </div>

        <div class="informacao-pagina">
            <p>O Super Gestão é o sistema online de controle administrativo que pode transformar e potencializar os
                negócios da sua empresa.</p>
            <p>Desenvolvido com a mais alta tecnologia para você cuidar do que é mais importante, seus negócios!</p>
        </div>
    </div>

    {{-- incluindo o rodapé --}}
    @include('site.layouts._partials._bottom')

@endsection
