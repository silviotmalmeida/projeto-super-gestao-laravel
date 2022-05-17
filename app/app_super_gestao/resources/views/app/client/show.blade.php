{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Clientes')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Visualizar Cliente</h1>
        </div>

        {{-- inserindo os links para as rotas --}}
        <div class="menu">
            <ul>
                <li><a href="{{ route('client.index') }}">Voltar</a></li>
                <li><a href="{{ route('client.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">

                <table border="1" style="text-align: left;">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $client->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $client->name }}</td>
                    </tr>                    
                </table>
            </div>
        </div>
    </div>

@endsection
