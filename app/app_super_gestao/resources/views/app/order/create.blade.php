{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Pedidos')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        {{-- caso o id do produto esteja definido, trata-se de uma edição --}}
        @if(isset($order->id))
            <h1>Editar Pedido</h1>
        {{-- senão, trata-se de um novo cadastro --}}
        @else
            <h1>Adicionar Pedido</h1>
        @endif
    </div>

    {{-- inserindo os links para as rotas --}}
    <div class="menu">
        <ul>
            <li><a href="{{ route('order.index') }}">Voltar</a></li>
            <li><a href="{{ route('order.index') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">

        {{-- renderizando a mensagem se tiver sido injetada --}}
        {{ $msg ?? '' }}

        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            
            {{-- adicionando o componente de formulário de criação e edição --}}
            {{-- caso o id do produto esteja definido, trata-se de uma edição --}}
            @if(isset($order->id))
                @component('app.order._components._create_update_form', ['order' => $order, 'clients' => $clients])@endcomponent
            {{-- senão, trata-se de um novo cadastro --}}
            @else
                @component('app.order._components._create_update_form', ['clients' => $clients])@endcomponent
            @endif   
        </div>
    </div>
</div>

@endsection