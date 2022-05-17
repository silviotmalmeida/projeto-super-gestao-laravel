{{-- definindo o componente de formulário de criação e edição de produtos --}}

{{-- adicionando conteúdo adicional da variável $slot, se houver --}}
{{ $slot }}

{{-- caso o id do produto esteja definido, trata-se de uma edição --}}
@if(isset($client->id))
{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form method="post" action="{{ route('client.update', $client->id) }}">
    {{-- inserindo o token csrf --}}
    @csrf
    {{-- alterando o verbo http como put --}}
    @method('PUT')
{{-- senão, trata-se de um novo cadastro --}}
@else
{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form method="post" action="{{ route('client.store') }}">
    {{-- inserindo o token csrf --}}
    @csrf
@endif
                
{{-- inserindo os inputs do formulário --}}
{{-- os campos value estão utilizando os dados de $client, caso existam --}}
{{-- os campos value estão utilizando a função old() para preservar os dados inseridos no caso de falha de validação --}}
{{-- em caso de falha de validação, as mensagens do erro serão exibidas abaixo do respectivo input --}}
<input type="hidden" name="id" value="{{ $client->id ?? '' }}" class="borda-preta">
                
{{-- inserindo o input --}}
<input type="text" name="name" value="{{ $client->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
{{-- inserindo a mensagem de erro referente ao input --}}
{{$errors->has('name') ? $errors->first('name') : ''}}
<br>
{{-- inserindo o button --}}
<button type="submit" class="borda-preta">Cadastrar</button>
<form>