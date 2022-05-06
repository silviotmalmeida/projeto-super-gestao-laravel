{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Produtos')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Adicionar Produto</h1>
    </div>

    {{-- inserindo os links para as rotas --}}
    <div class="menu">
        <ul>
            <li><a href="{{ route('product.index') }}">Voltar</a></li>
            <li><a href="{{ route('product.index') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">

        {{-- renderizando a mensagem se tiver sido injetada --}}
        {{ $msg ?? '' }}

        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            {{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
            <form method="post" action="{{ route('product.store') }}">
                {{-- inserindo o token csrf --}}
                @csrf
                {{-- inserindo os inputs do formulário --}}
                {{-- os campos value estão utilizando os dados de $product, caso existam --}}
                {{-- os campos value estão utilizando a função old() para preservar os dados inseridos no caso de falha de validação --}}
                {{-- em caso de falha de validação, as mensagens do erro serão exibidas abaixo do respectivo input --}}
                <input type="hidden" name="id" value="{{ $product->id ?? '' }}" class="borda-preta">
                                
                {{-- inserindo o input --}}
                <input type="text" name="name" value="{{ $product->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
                {{-- inserindo a mensagem de erro referente ao input --}}
                {{$errors->has('name') ? $errors->first('name') : ''}}
                <br>
                {{-- inserindo o input --}}
                <input type="text" name="description" value="{{ $product->description ?? old('description') }}" placeholder="Descrição" class="borda-preta">
                {{-- inserindo a mensagem de erro referente ao input --}}
                {{$errors->has('description') ? $errors->first('description') : ''}}
                <br>
                {{-- inserindo o input --}}
                <input type="text" name="weight" value="{{ $product->weight ?? old('weight') }}" placeholder="Peso" class="borda-preta">
                {{-- inserindo a mensagem de erro referente ao input --}}
                {{$errors->has('weight') ? $errors->first('weight') : ''}}
                <br>
                {{-- inserindo o select --}}
                <select name="unit_id" class="borda-preta">
                    <option value="" {{ old('unit_id') == '' ? 'selected' : '' }}>Selecione a unidade de medida</option>

                    {{-- iterando sobre as units cadastradas --}}
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                    @endforeach
                    
                </select>
                <br>
                {{-- inserindo o button --}}
                <button type="submit" class="borda-preta">Cadastrar</button>
            <form>
        </div>
    </div>
</div>

@endsection