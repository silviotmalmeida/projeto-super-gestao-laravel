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
                            <th>Unidade de Peso</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th>Unidade de Tamanhos</th>
                            <th>Fornecedor</th>
                            <th>Site do Fornecedor</th>
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
                                <td>{{ $product->unit->name }}</td>

                                {{-- consultando os dados relacionados à tabela product_detail --}}
                                {{-- se não existirem dados relacionados, insere '' --}}
                                <td>{{ $product->product_detail->lenght ?? '' }}</td>
                                <td>{{ $product->product_detail->width ?? ''  }}</td>
                                <td>{{ $product->product_detail->height ?? ''  }}</td>
                                <td>{{ $product->product_detail->unit->name ?? ''  }}</td>

                                {{-- consultando os dados relacionados à tabela providers --}}
                                {{-- se não existirem dados relacionados, insere '' --}}
                                <td>{{ $product->provider->name ?? '' }}</td>
                                <td>{{ $product->provider->site ?? '' }}</td>

                                {{-- inserindo os links de ação --}}
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

                            {{-- consultando os dados relacionados à tabela order --}}
                            {{-- se existirem produtos associados ao produto, desenha a tabela de pedidos --}}
                            @if($product->order->count())
                            <tr>
                                <td colspan="13">
                                    <p>Pedidos</p>
                                    <table border="1" style="margin: 20px">
                                        <thead>
                                            <tr>
                                                <th>ID do Pedido</th>
                                                <th>Data do Pedido</th>
                                                <th>Quantidade de itens</th>
                                                <th>ID do Cliente</th>
                                                <th>Nome do Cliente</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- iterando sobre a lista de pedidos daquele produto --}}
                                            @foreach($product->order as $key => $order)
                                            <tr>
                                                <td><a href="{{ route('order_product.create', $order->id) }}">{{ $order->id }}</a></td>
                                                <td>{{ $order->pivot->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $order->pivot->qtd }}</td>
                                                <td>{{ $order->client->id }}</td>
                                                <td>{{ $order->client->name }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @endif
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
