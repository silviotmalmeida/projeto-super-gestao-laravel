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
                        @foreach ($providers as $provider)
                            <tr>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->site }}</td>
                                <td>{{ $provider->uf }}</td>
                                <td>{{ $provider->email }}</td>
                                <td>Excluir</td>
                                <td>Editar</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
