{{-- definindo o componente de formulário de criação e edição de produtos --}}

{{-- adicionando conteúdo adicional da variável $slot, se houver --}}
{{ $slot }}

{{-- caso o id do produto esteja definido, trata-se de uma edição --}}
@if(isset($order->id))
{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form method="post" action="{{ route('order.update', $order->id) }}">
    {{-- inserindo o token csrf --}}
    @csrf
    {{-- alterando o verbo http como put --}}
    @method('PUT')
{{-- senão, trata-se de um novo cadastro --}}
@else
{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form method="post" action="{{ route('order.store') }}">
    {{-- inserindo o token csrf --}}
    @csrf
@endif
                
{{-- inserindo os inputs do formulário --}}
{{-- os campos value estão utilizando os dados de $order, caso existam --}}
{{-- os campos value estão utilizando a função old() para preservar os dados inseridos no caso de falha de validação --}}
{{-- em caso de falha de validação, as mensagens do erro serão exibidas abaixo do respectivo input --}}
<input type="hidden" name="id" value="{{ $order->id ?? '' }}" class="borda-preta">

{{-- inserindo o select --}}
<select name="client_id" class="borda-preta">
    <option value="" @if(old('client_id') == '' and isset($order->client_id) and $order->client_id == '')selected @endif>Selecione o cliente</option>

    {{-- iterando sobre as units cadastradas --}}
    @foreach ($clients as $client)
        <option value="{{ $client->id }}" @if(old('client') == $client->id or (isset($order->client_id) and $order->client_id == $client->id))selected @endif>{{ $client->name }}</option>
    @endforeach
    
</select>
{{-- inserindo a mensagem de erro referente ao select --}}
{{$errors->has('client_id') ? $errors->first('client_id') : ''}}
<br>
{{-- inserindo o button --}}
<button type="submit" class="borda-preta">Cadastrar</button>
<form>