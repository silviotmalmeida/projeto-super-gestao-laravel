<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importando a model Provider
use App\Provider;

// controller responsável pelas ações da rota /app/provider
class ProviderController extends Controller
{
    // criando a ação index
    public function index()
    {
        // renderiza a view index
        return view('app.provider.index');
    }

    // criando a ação list
    public function list(Request $request)
    {
        // consulta no BD, utilizando os dados do formulário
        $providers = Provider::where('name', 'like', '%' . $request->input('name') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->get();

        // renderiza a view list, passando os resultados da consulta
        return view('app.provider.list', ['providers' => $providers]);
    }

    // criando a ação add
    public function add(Request $request)
    {

        // inicializando a variável de mensagem
        $msg = '';

        // se na requisição o token csrf estiver preenchido
        if ($request->input('_token') != '') {

            // validando os dados recebidos do formulário
            $request->validate(
                // definição das validações de cada campo
                [
                    'name' => 'required|min:3|max:50',
                    'site' => 'required',
                    'uf' => 'required|min:2|max:2',
                    'email' => 'required|email|max:80',
                ],
                // customização das mensagens de erro
                [
                    'required' => 'O campo não pode ser vazio!',
                    'name.min' => 'O campo nome não ter menos de 3 caracteres!',
                    'name.max' => 'O campo nome não ter mais de 50 caracteres!',
                    'uf.min' => 'O campo UF deve possuir exatamente 2 caracteres!',
                    'uf.max' => 'O campo UF deve possuir exatamente 2 caracteres!',
                    'email' => 'E-mail inválido!',
                    'email.max' => 'O campo email não ter mais de 80 caracteres!',
                ]
            );

            // insere os dados no BD
            $provider = new Provider();
            $provider->create($request->all());

            // criando mensagem de sucesso
            $msg = 'Cadastro realizado com sucesso!';
        }

        // renderiza a view add, injetando a mensagem
        return view('app.provider.add', ['msg' => $msg]);
    }
}
