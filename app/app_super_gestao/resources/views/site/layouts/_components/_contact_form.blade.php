{{-- definindo o componente de formulário de contato --}}

{{-- adicionando conteúdo adicional da variável $slot, se houver --}}
{{ $slot }}

{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form action="{{ route('site.contact') }}" method="POST">
    {{-- inserindo o token csrf --}}
    @csrf

    {{-- inserindo os inputs do formulário --}}
    {{-- os campos value estão utilizando a função old() para preservar os dados inseridos no caso de falha de validação --}}
    <input name="name" value="{{ old('name') }}" type="text" placeholder="Nome" class="{{ $borderClass }}">
    <br>
    <input name="phone" value="{{ old('phone') }}" type="text" placeholder="Telefone" class="{{ $borderClass }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $borderClass }}">
    <br>
    <select name="reason" class="{{ $borderClass }}">
        <option value="" {{ old('reason') == '' ? 'selected' : '' }}>Qual o motivo do contato?</option>

        @foreach ($reasons as $key => $reason)
            <option value="{{ $key }}" {{ old('reason') == $key ? 'selected' : '' }}>{{ $reason }}
            </option>
        @endforeach

    </select>
    <br>

    {{-- se existir conteúdo anterior --}}
    @if (old('mensagem') != '')
        {{-- preserva-o --}}
        <textarea name="message" class="{{ $borderClass }}">{{ old('mensagem') }}</textarea>

        {{-- senão --}}
    @else
        {{-- insere texto padrão --}}
        <textarea name="message" class="{{ $borderClass }}">Preencha aqui a sua mensagem</textarea>
    @endif

    <br>
    <button type="submit" class="{{ $borderClass }}">ENVIAR</button>
</form>
