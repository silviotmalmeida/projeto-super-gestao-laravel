{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Fornecedores')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Adicionar Fornecedor</h1>
    </div>

    {{-- incluindo o menu especifico de provider --}}
    @include('app.provider._partials._nav')

    <div class="informacao-pagina">

        {{-- renderizando a mensagem se tiver sido injetada --}}
        {{ $msg ?? '' }}

        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            {{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
            <form method="post" action="{{ route('app.provider.add') }}">
                {{-- inserindo o token csrf --}}
                @csrf
                {{-- inserindo os inputs do formulário --}}
                {{-- os campos value estão utilizando os dados de $provider, caso existam --}}
                {{-- os campos value estão utilizando a função old() para preservar os dados inseridos no caso de falha de validação --}}
                {{-- em caso de falha de validação, as mensagens do erro serão exibidas abaixo do respectivo input --}}
                
                
                <input type="hidden" name="id" value="{{ $provider->id ?? '' }}" class="borda-preta">
                
                
                {{-- inserindo o input --}}
                <input type="text" name="name" value="{{ $provider->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
                {{-- inserindo a mensagem de erro referente ao input --}}
                {{$errors->has('name') ? $errors->first('name') : ''}}
                <br>
                {{-- inserindo o input --}}
                <input type="text" name="site" value="{{ $provider->site ?? old('site') }}" placeholder="Site" class="borda-preta">
                {{-- inserindo a mensagem de erro referente ao input --}}
                {{$errors->has('site') ? $errors->first('site') : ''}}
                <br>
                {{-- inserindo o input --}}
                <input type="text" name="uf" value="{{ $provider->uf ?? old('uf') }}" placeholder="UF" class="borda-preta">
                {{-- inserindo a mensagem de erro referente ao input --}}
                {{$errors->has('uf') ? $errors->first('uf') : ''}}
                <br>
                {{-- inserindo o input --}}
                <input type="text" name="email" value="{{ $provider->email ?? old('email') }}" placeholder="E-mail" class="borda-preta">
                {{-- inserindo a mensagem de erro referente ao input --}}
                {{$errors->has('email') ? $errors->first('email') : ''}}
                <br>
                {{-- inserindo o button --}}
                <button type="submit" class="borda-preta">Cadastrar</button>
            <form>
        </div>
    </div>
</div>

@endsection