{{-- definindo o componente de formulário de contato --}}

{{-- adicionando conteúdo adicional da variável $slot, se houver --}}
{{ $slot }}

{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form action="{{ route('site.contact') }}" method="POST">
    {{-- inserindo o token csrf --}}
    @csrf

    {{-- inserindo os inputs do formulário --}}
    {{-- os campos value estão utilizando a função old() para preservar os dados inseridos no caso de falha de validação --}}
    {{-- em caso de falha de validação, as mensagens do erro serão exibidas abaixo do respectivo input --}}
    {{-- inserindo o input --}}
    <input name="name" value="{{ old('name') }}" type="text" placeholder="Nome" class="{{ $borderClass }}">
    {{-- inserindo a mensagem de erro referente ao input --}}
    {{$errors->has('name') ? $errors->first('name') : ''}}
    <br>
    {{-- inserindo o input --}}
    <input name="phone" value="{{ old('phone') }}" type="text" placeholder="Telefone" class="{{ $borderClass }}">
    {{-- inserindo a mensagem de erro referente ao input --}}
    {{$errors->has('phone') ? $errors->first('phone') : ''}}
    <br>
    {{-- inserindo o input --}}
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $borderClass }}">
    {{-- inserindo a mensagem de erro referente ao input --}}
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>
    {{-- inserindo o select --}}
    <select name="contact_reasons_id" class="{{ $borderClass }}">
        <option value="" {{ old('contact_reasons_id') == '' ? 'selected' : '' }}>Qual o motivo do contato?</option>

        @foreach ($reasons as $reason)
            <option value="{{ $reason->id }}" {{ old('contact_reasons_id') == $reason->id ? 'selected' : '' }}>{{ $reason->reason }}</option>
        @endforeach

    </select>
    {{-- inserindo a mensagem de erro referente ao select --}}
    {{$errors->has('contact_reasons_id') ? $errors->first('contact_reasons_id') : ''}}
    <br>
    {{-- inserindo a textarea --}}
    {{-- se existir conteúdo anterior --}}
    @if (old('message') != '')
        {{-- preserva-o --}}
        <textarea name="message" class="{{ $borderClass }}">{{ old('message') }}</textarea>

        {{-- senão --}}
    @else
        {{-- insere texto padrão --}}
        <textarea name="message" class="{{ $borderClass }}">Preencha aqui a sua mensagem</textarea>
    @endif
    {{-- inserindo a mensagem de erro referente à textarea --}}
    {{$errors->has('message') ? $errors->first('message') : ''}}
    <br>
    {{-- inserindo o button --}}
    <button type="submit" class="{{ $borderClass }}">ENVIAR</button>
</form>