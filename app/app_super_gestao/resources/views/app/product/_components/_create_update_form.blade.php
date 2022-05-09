{{-- definindo o componente de formulário de criação e edição de produtos --}}

{{-- adicionando conteúdo adicional da variável $slot, se houver --}}
{{ $slot }}

{{-- caso o id do produto esteja definido, trata-se de uma edição --}}
@if(isset($product->id))
{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form method="post" action="{{ route('product.update', $product->id) }}">
    {{-- inserindo o token csrf --}}
    @csrf
    {{-- alterando o verbo http como put --}}
    @method('PUT')
{{-- senão, trata-se de um novo cadastro --}}
@else
{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form method="post" action="{{ route('product.store') }}">
    {{-- inserindo o token csrf --}}
    @csrf
@endif
                
{{-- inserindo os inputs do formulário --}}
{{-- os campos value estão utilizando os dados de $product, caso existam --}}
{{-- os campos value estão utilizando a função old() para preservar os dados inseridos no caso de falha de validação --}}
{{-- em caso de falha de validação, as mensagens do erro serão exibidas abaixo do respectivo input --}}
<input type="hidden" name="id" value="{{ $product->id ?? '' }}" class="borda-preta">
                
{{-- inserindo o input --}}
<input type="text" name="name" value="{{ $product->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
{{-- inserindo a mensagem de erro referente ao input --}}
{{$errors->has('name') ? $errors->first('name') : ''}}
<br>
{{-- inserindo o input --}}
<input type="text" name="description" value="{{ $product->description ?? old('description') }}" placeholder="Descrição" class="borda-preta">
{{-- inserindo a mensagem de erro referente ao input --}}
{{$errors->has('description') ? $errors->first('description') : ''}}
<br>
{{-- inserindo o input --}}
<input type="text" name="weight" value="{{ $product->weight ?? old('weight') }}" placeholder="Peso" class="borda-preta">
{{-- inserindo a mensagem de erro referente ao input --}}
{{$errors->has('weight') ? $errors->first('weight') : ''}}
<br>
{{-- inserindo o select --}}
<select name="unit_id" class="borda-preta">
    <option value="" @if(old('unit_id') == '' and isset($product->unit_id) and $product->unit_id == '')selected @endif>Selecione a unidade de medida</option>

    {{-- iterando sobre as units cadastradas --}}
    @foreach ($units as $unit)
        <option value="{{ $unit->id }}" @if(old('unit_id') == $unit->id or (isset($product->unit_id) and $product->unit_id == $unit->id))selected @endif>{{ $unit->name }}</option>
    @endforeach
    
</select>
{{-- inserindo a mensagem de erro referente ao select --}}
{{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}
<br>
{{-- inserindo o button --}}
<button type="submit" class="borda-preta">Cadastrar</button>
<form>