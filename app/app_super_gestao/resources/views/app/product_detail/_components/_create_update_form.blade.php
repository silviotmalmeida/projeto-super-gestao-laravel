{{-- definindo o componente de formulário de criação e edição de produtos --}}

{{-- adicionando conteúdo adicional da variável $slot, se houver --}}
{{ $slot }}

{{-- caso o id do produto esteja definido, trata-se de uma edição --}}
@if(isset($product_detail->id))
{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form method="post" action="{{ route('product_detail.update', $product_detail->id) }}">
    {{-- inserindo o token csrf --}}
    @csrf
    {{-- alterando o verbo http como put --}}
    @method('PUT')
{{-- senão, trata-se de um novo cadastro --}}
@else
{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form method="post" action="{{ route('product_detail.store') }}">
    {{-- inserindo o token csrf --}}
    @csrf
@endif
                
{{-- inserindo os inputs do formulário --}}
{{-- os campos value estão utilizando os dados de $product_detail, caso existam --}}
{{-- os campos value estão utilizando a função old() para preservar os dados inseridos no caso de falha de validação --}}
{{-- em caso de falha de validação, as mensagens do erro serão exibidas abaixo do respectivo input --}}
<input type="hidden" name="id" value="{{ $product_detail->id ?? '' }}" class="borda-preta">
                
{{-- inserindo o input --}}
<input type="text" name="lenght" value="{{ $product_detail->lenght ?? old('lenght') }}" placeholder="Comprimento" class="borda-preta">
{{-- inserindo a mensagem de erro referente ao input --}}
{{$errors->has('lenght') ? $errors->first('lenght') : ''}}
<br>
{{-- inserindo o input --}}
<input type="text" name="width" value="{{ $product_detail->width ?? old('width') }}" placeholder="Largura" class="borda-preta">
{{-- inserindo a mensagem de erro referente ao input --}}
{{$errors->has('width') ? $errors->first('width') : ''}}
<br>
{{-- inserindo o input --}}
<input type="text" name="height" value="{{ $product_detail->height ?? old('height') }}" placeholder="Altura" class="borda-preta">
{{-- inserindo a mensagem de erro referente ao input --}}
{{$errors->has('height') ? $errors->first('height') : ''}}
<br>
{{-- inserindo o select --}}
<select name="unit_id" class="borda-preta">
    <option value="" @if(old('unit_id') == '' and isset($product_detail->unit_id) and $product_detail->unit_id == '')selected @endif>Selecione a unidade de medida</option>

    {{-- iterando sobre as units cadastradas --}}
    @foreach ($units as $unit)
        <option value="{{ $unit->id }}" @if(old('unit_id') == $unit->id or (isset($product_detail->unit_id) and $product_detail->unit_id == $unit->id))selected @endif>{{ $unit->name }}</option>
    @endforeach
    
</select>
{{-- inserindo a mensagem de erro referente ao select --}}
{{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}
<br>
{{-- inserindo o select --}}
<select name="product_id" class="borda-preta">
    <option value="" @if(old('product_id') == '' and isset($product_detail->product_id) and $product_detail->product_id == '')selected @endif>Selecione o produto</option>

    {{-- iterando sobre os produtos --}}
    @foreach ($products as $product)
        <option value="{{ $product->id }}" @if(old('unit_id') == $product->id or (isset($product_detail->product_id) and $product_detail->product_id == $product->id))selected @endif>{{ $product->name }}</option>
    @endforeach
    
</select>
{{-- inserindo a mensagem de erro referente ao select --}}
{{$errors->has('product_id') ? $errors->first('product_id') : ''}}
<br>

{{-- inserindo o button --}}
<button type="submit" class="borda-preta">Cadastrar</button>
<form>