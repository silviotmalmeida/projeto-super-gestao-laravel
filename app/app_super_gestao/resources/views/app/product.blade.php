{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Produtos')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Produtos</h1>
    </div>

    <div class="informacao-pagina">
        <p></p>
    </div>
</div>

@endsection