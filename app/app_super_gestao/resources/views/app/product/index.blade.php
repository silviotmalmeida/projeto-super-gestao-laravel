{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Produtos')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Listar Produtos</h1>
        </div>

        {{-- inserindo os links para as rotas --}}
        <div class="menu">
            <ul>
                <li><a href="{{ route('product.create') }}">Novo</a></li>
                <li><a href="{{ route('product.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">

                {{-- desenhando a tabela com os registros --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- desenhando os registros --}}
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->weight }}</td>
                                <td>{{ $product->unit_id }}</td>
                                <td><a href="{{ route('product.show', $product->id) }}">Visualizar</a></td>
                                <td><a href="{{ route('product.edit', $product->id) }}">Editar</a></td>
                                {{-- para o caso do excluir, como utiliza o verbo http delete --}}
                                {{-- deve-se incluir um form para isto, com id dinâmico, e ativado por um link com javascript --}}
                                <td>
                                    <form id="form_delete_{{ $product->id }}" method="post" action="{{ route('product.destroy', $product->id) }}">
                                        {{-- inserindo o token csrf --}}
                                        @csrf
                                        {{-- alterando o verbo http como delete --}}
                                        @method('DELETE')
                                        {{-- inserindo o link com evento de javascript para submeter o formulário --}}
                                        <a href="#" onclick="document.getElementById('form_delete_{{ $product->id }}').submit()">Excluir</a></td>
                                    </form>    
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- gerando os links da paginação --}}
                {{-- utiliza o $request para persistência dos filtros --}}
                {{ $products->appends($request)->links() }}
            </div>
        </div>
    </div>

@endsection
