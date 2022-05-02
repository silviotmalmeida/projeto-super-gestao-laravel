{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Fornecedores')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Fornecedores</h1>
    </div>

    {{-- incluindo o menu especifico de provider --}}
    @include('app.provider._partials._nav')

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form method="post" action="{{ route('app.provider.list')}}">
                @csrf
                <input type="text" name="name" placeholder="Nome" class="borda-preta">
                <input type="text" name="site" placeholder="Site" class="borda-preta">
                <input type="text" name="uf" placeholder="UF" class="borda-preta">
                <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                <button type="submit" class="borda-preta">Pesquisar</button>
            <form>
        </div>
    </div>
</div>

@endsection