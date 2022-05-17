{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Clientes')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Listar Clientes</h1>
        </div>

        {{-- inserindo os links para as rotas --}}
        <div class="menu">
            <ul>
                <li><a href="{{ route('client.create') }}">Novo</a></li>
                <li><a href="{{ route('client.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">

                {{-- desenhando a tabela com os registros --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- desenhando os registros --}}
                        @foreach ($clients as $client)
                                
                            <tr>
                                <td>{{ $client->name }}</td>

                                {{-- inserindo os links de ação --}}
                                <td><a href="{{ route('client.show', $client->id) }}">Visualizar</a></td>
                                <td><a href="{{ route('client.edit', $client->id) }}">Editar</a></td>
                                {{-- para o caso do excluir, como utiliza o verbo http delete --}}
                                {{-- deve-se incluir um form para isto, com id dinâmico, e ativado por um link com javascript --}}
                                <td>
                                    <form id="form_delete_{{ $client->id }}" method="post" action="{{ route('client.destroy', $client->id) }}">
                                        {{-- inserindo o token csrf --}}
                                        @csrf
                                        {{-- alterando o verbo http como delete --}}
                                        @method('DELETE')
                                        {{-- inserindo o link com evento de javascript para submeter o formulário --}}
                                        <a href="#" onclick="document.getElementById('form_delete_{{ $client->id }}').submit()">Excluir</a></td>
                                    </form>    
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- gerando os links da paginação --}}
                {{-- utiliza o $request para persistência dos filtros --}}
                {{ $clients->appends($request)->links() }}
            </div>
        </div>
    </div>

@endsection
