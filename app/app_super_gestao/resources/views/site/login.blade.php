{{-- extende do arquivo base de layout --}}
@extends('site.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Login')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
            
                {{-- definindo a rota de destino e o verbo http a ser utilizado pelo formulário --}}
                <form action="{{ route('site.login') }}" method="POST">
                    {{-- inserindo o token csrf --}}
                    @csrf

                    {{-- inserindo os inputs do formulário --}}
                    {{-- os campos value estão utilizando a função old() para preservar os dados inseridos no caso de falha de validação --}}
                    {{-- em caso de falha de validação, as mensagens do erro serão exibidas abaixo do respectivo input --}}
                    {{-- inserindo o input --}}
                    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
                    {{-- inserindo a mensagem de erro referente ao input --}}
                    {{$errors->has('email') ? $errors->first('email') : ''}}
                    <br>
                    {{-- inserindo o input --}}
                    <input name="password" value="{{ old('password') }}" type="password" placeholder="Senha" class="borda-preta">
                    {{-- inserindo a mensagem de erro referente ao input --}}
                    {{$errors->has('password') ? $errors->first('password') : ''}}
                    <br>
                    
                    {{-- inserindo o button --}}
                    <button type="submit" class="borda-preta">LOGIN</button>
                </form>

                {{-- se houve erro de autenticação, exibe a mensagem --}}
                {{ (isset($error) and $error == 1) ? 'Usuário ou senha inválidos!' : ''}}

                {{-- se houve tentativa de acesso à área restrita --}}
                {{ (isset($error) and $error == 2) ? 'Área restrita! Realize login para continuar.' : ''}}

            </div>  

        </div>
    </div>

    {{-- incluindo o rodapé --}}
    @include('site.layouts._partials._bottom')

@endsection
