{{-- extende do arquivo base de layout --}}
@extends('site.layouts.base')

{{-- definindo o título a ser injetado --}}
@section('title', 'Contato')

{{-- definindo o conteúdo a ser injetado --}}
@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">

                {{-- adicionando o componente de formulário de contato --}}
                {{-- definindo o valor da variável $borderClass, a ser injetada no componente --}}
                {{-- definindo o valor da variável $reasons, a ser injetada no componente --}}
                @component('site.layouts._components._contact_form', [
                    'borderClass' => 'borda-preta',
                    'reasons' => $reasons,
                    ])
                    {{-- definindo o valor da variável $slot, a ser injetada no componente --}}
                    <p>A nossa equipe analisará a sua mensagem e retornaremos o mais brevemente possível!</p>
                    <p>Nosso tempo médio de reposta é de 48 horas.</p>
                @endcomponent

            </div>
        </div>
    </div>

    {{-- incluindo o rodapé --}}
    @include('site.layouts._partials._bottom')

@endsection
