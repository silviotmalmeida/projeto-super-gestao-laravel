{{-- arquivo responsável pela criação do menu superior --}}
<div class="topo">

    {{-- inserindo a logomarca --}}
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    {{-- inserindo os links para as rotas --}}
    <div class="menu">
        <ul>
            <li><a href="{{ route('site.index') }}">Principal</a></li>
            <li><a href="{{ route('site.about') }}">Sobre Nós</a></li>
            <li><a href="{{ route('site.contact') }}">Contato</a></li>
            <li><a href="{{ route('site.login') }}">Área Restrita</a></li>
        </ul>
    </div>
</div>
