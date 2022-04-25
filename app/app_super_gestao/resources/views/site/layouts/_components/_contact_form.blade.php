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
    <select name="contact_reasons_id" class="{{ $borderClass }}">
        <option value="" {{ old('contact_reasons_id') == '' ? 'selected' : '' }}>Qual o motivo do contato?</option>

        @foreach ($reasons as $reason)
            <option value="{{ $reason->id }}" {{ old('contact_reasons_id') == $reason->id ? 'selected' : '' }}>{{ $reason->reason }}</option>
        @endforeach

    </select>
    <br>

    {{-- se existir conteúdo anterior --}}
    @if (old('message') != '')
        {{-- preserva-o --}}
        <textarea name="message" class="{{ $borderClass }}">{{ old('message') }}</textarea>

        {{-- senão --}}
    @else
        {{-- insere texto padrão --}}
        <textarea name="message" class="{{ $borderClass }}">Preencha aqui a sua mensagem</textarea>
    @endif

    <br>
    <button type="submit" class="{{ $borderClass }}">ENVIAR</button>
</form>

@if($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background:red;">

    <pre>

        @foreach($errors->all() as $error)
            {{$error}}
            <br>
        @endforeach

    </pre>

    </div>
@endif
