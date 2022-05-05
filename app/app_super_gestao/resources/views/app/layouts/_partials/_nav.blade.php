{{-- arquivo responsável pela criação do menu superior --}}
<div class="topo">

    {{-- inserindo a logomarca --}}
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    {{-- inserindo os links para as rotas --}}
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('app.client') }}">Clientes</a></li>
            <li><a href="{{ route('app.provider') }}">Fornecedores</a></li>
            <li><a href="{{ route('product.index') }}">Produtos</a></li>
            <li><a href="{{ route('app.logout') }}">Sair</a></li>
        </ul>
    </div>
</div>
