{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Produtos')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Visualizar Produto</h1>
        </div>

        {{-- inserindo os links para as rotas --}}
        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}">Voltar</a></li>
                <li><a href="{{ route('product.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">

                <table border="1" style="text-align: left;">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <td>Peso:</td>
                        <td>{{ $product->weight }}</td>
                    </tr>
                    <tr>
                        <td>Unidade:</td>
                        <td>{{ $product->unit_id }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
