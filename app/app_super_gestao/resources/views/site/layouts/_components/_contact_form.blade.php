{{-- definindo o componente de formulário de contato --}}

{{-- adicionando conteúdo adicional da variável $slot, se houver --}}
{{ $slot }}

{{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
<form action="{{ route('site.contact') }}" method="POST">
    {{-- inserindo o token csrf --}}
    @csrf

    <input name="name" type="text" placeholder="Nome" class="{{ $borderClass }}">
    <br>
    <input name="phone" type="text" placeholder="Telefone" class="{{ $borderClass }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $borderClass }}">
    <br>
    <select name="reason" class="{{ $borderClass }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="message" class="{{ $borderClass }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $borderClass }}">ENVIAR</button>
</form>
