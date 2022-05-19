{{-- extende do arquivo base de layout --}}
@extends('app.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Pedido - Produtos')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        
        <h1>Adicionar Produtos ao Pedido</h1>
        
    </div>

    <div class="informacao-pagina">

        {{-- renderizando a mensagem se tiver sido injetada --}}
        {{ $msg ?? '' }}

        {{-- exibindo os dados do pedido --}}
        <h4>Detalhes do Pedido</h4>
        <p>ID do pedido: {{$order->id}}</p>
        <p>ID do cliente: {{$order->client_id}}</p>
        <p>Nome do cliente: {{$order->client->name}}</p>

        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            
            {{-- se existirem produtos no pedido --}}
            @if($order->product->count())

                {{-- exibindo os itens do pedido --}}
                <h4>Itens do Pedido</h4>

                {{-- desenhando a tabela com os registros --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do produto</th>
                            <th>Quantidade de itens</th>
                            <th>Data da inclusão ao Pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- iterando sobre a lista de produtos daquele pedido --}}
                        @foreach($order->product as $key => $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->qtd }}</td>
                                <td>{{ $product->pivot->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif  
            
            <br>
                        
            {{-- definindo a rota de destino e o verb http a ser utilizado pelo formulário --}}
            <form method="post" action="{{ route('order_product.store', $order->id) }}">
                {{-- inserindo o token csrf --}}
                @csrf
                                        
                {{-- inserindo os inputs do formulário --}}
                {{-- os campos value estão utilizando os dados de $order, caso existam --}}
                {{-- os campos value estão utilizando a função old() para preservar os dados inseridos no caso de falha de validação --}}
                {{-- em caso de falha de validação, as mensagens do erro serão exibidas abaixo do respectivo input --}}
                <input type="hidden" name="id" value="{{ $order->id ?? '' }}" class="borda-preta">
                              
                {{-- inserindo o select --}}
                <select name="product_id" class="borda-preta">
                    <option value="" @if(old('product_id') == '')selected @endif>Selecione o produto</option>

                    {{-- iterando sobre os produtos cadastrados --}}
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" @if(old('product_id') == $product->id)selected @endif>{{ $product->name }}</option>
                    @endforeach
                    
                </select>
                {{-- inserindo a mensagem de erro referente ao select --}}
                {{$errors->has('product_id') ? $errors->first('product_id') : ''}}
                <br>

                {{-- inserindo o input --}}
                <input type="text" name="qtd" value="{{ old('qtd') ?? '' }}" placeholder="Quantidade de itens" class="borda-preta">
                {{-- inserindo a mensagem de erro referente ao input --}}
                {{$errors->has('qtd') ? $errors->first('qtd') : ''}}
                <br>
                
                {{-- inserindo o button --}}
                <button type="submit" class="borda-preta">Cadastrar</button>
            <form>
        </div>
    </div>
</div>

@endsection