{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Pedidos')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Listar Pedidos</h1>
        </div>

        {{-- inserindo os links para as rotas --}}
        <div class="menu">
            <ul>
                <li><a href="{{ route('order.create') }}">Novo</a></li>
                <li><a href="{{ route('order.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">

                {{-- desenhando a tabela com os registros --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>Nome do Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- desenhando os registros --}}
                        @foreach ($orders as $order)
                                
                            <tr>
                                <td>{{ $order->id }}</td>

                                {{-- consultando os dados relacionados à tabela clients --}}
                                <td>{{ $order->client->name }}</td>

                                {{-- inserindo os links de ação --}}
                                <td><a href="{{ route('order.show', $order->id) }}">Visualizar</a></td>
                                <td><a href="{{ route('order.edit', $order->id) }}">Editar</a></td>
                                {{-- para o caso do excluir, como utiliza o verbo http delete --}}
                                {{-- deve-se incluir um form para isto, com id dinâmico, e ativado por um link com javascript --}}
                                <td>
                                    <form id="form_delete_{{ $order->id }}" method="post" action="{{ route('order.destroy', $order->id) }}">
                                        {{-- inserindo o token csrf --}}
                                        @csrf
                                        {{-- alterando o verbo http como delete --}}
                                        @method('DELETE')
                                        {{-- inserindo o link com evento de javascript para submeter o formulário --}}
                                        <a href="#" onclick="document.getElementById('form_delete_{{ $order->id }}').submit()">Excluir</a></td>
                                    </form>    
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- gerando os links da paginação --}}
                {{-- utiliza o $request para persistência dos filtros --}}
                {{ $orders->appends($request)->links() }}
            </div>
        </div>
    </div>

@endsection
