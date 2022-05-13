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
            <div style="width: 90%; margin-left: auto; margin-right: auto;">

                {{-- desenhando a tabela com os registros --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- desenhando os registros de fornecedor --}}
                        @foreach ($providers as $provider)
                            <tr>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->site }}</td>
                                <td>{{ $provider->uf }}</td>
                                <td>{{ $provider->email }}</td>
                                <td><a href="{{ route('app.provider.edit', $provider->id) }}">Editar</a></td>
                                <td><a href="{{ route('app.provider.delete', $provider->id) }}">Excluir</a></td>
                            </tr>

                            {{-- consultando os dados relacionados à tabela products --}}
                            {{-- se existirem produtos associados ao fornecedor, desenha a tabela de produtos --}}
                            @if($provider->product->count())
                            <tr>
                                <td colspan="6">
                                    <p>Lista de Produtos</p>
                                    <table border="1" style="margin: 20px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($provider->product as $key => $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
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
                {{ $providers->appends($request)->links() }}
            </div>
        </div>
    </div>

@endsection
