{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Fornecedores')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Listar Fornecedores</h1>
    </div>

    {{-- incluindo o menu especifico de provider --}}
    @include('app.provider._partials._nav')

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            ... Lista ...
        </div>
    </div>
</div>

@endsection