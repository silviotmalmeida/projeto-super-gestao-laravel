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
        // paginando os registros
        $providers = Provider::with('product')->where('name', 'like', '%' . $request->input('name') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(5);

        // renderiza a view list, passando os resultados da consulta e os parâmetros do request
        // o envio dos parâmetros do request possibilita a persistência dos filtros utilizados na paginação
        return view('app.provider.list', ['providers' => $providers, 'request' => $request->all()]);
    }

    // criando a ação add
    public function add(Request $request)
    {

        // inicializando a variável de mensagem
        $msg = '';

        // se na requisição o token csrf estiver preenchido e o id for vazio
        if ($request->input('_token') != '' && $request->input('id') == '') {

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
        // se na requisição o token csrf estiver preenchido e o id não for vazio
        else if ($request->input('_token') != '' && $request->input('id') != '') {

            // validando os dados recebidos do formulário
            $request->validate(
                // definição das validações de cada campo
                [
                    'id' => 'required',
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

            // atualiza os dados no BD
            $provider = Provider::find($request->input('id'));
            $sucess = $provider->update($request->all());

            // se houve sucesso na operação
            if ($sucess) {

                // criando mensagem de sucesso
                $msg = 1;
            } else {

                // criando mensagem de erro
                $msg = 0;
            }

            // redireciona para a rota edit, para recarregar o formulário com os dados atualizados
            return redirect()->route('app.provider.edit', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        // renderiza a view add, injetando a mensagem
        return view('app.provider.add', ['msg' => $msg]);
    }

    // criando a ação edit
    public function edit($id, $msg = '')
    {

        // definindo a mensagem de feedback
        if ($msg == '') {
            $msg = '';
        } else if ($msg == 0) {
            $msg = 'Ocorreu um erro na atualização do registro!';
        } else if ($msg == 1) {
            $msg = 'Atualização realizada com sucesso!';
        } else {
            $msg = '';
        }

        // consulta no BD, utilizando o id
        $provider = Provider::find($id);

        // se não houver correspondência no BD
        if (!$provider->id) {

            // renderiza a view index
            return view('app.provider.index');
        }
        // senão
        else {

            // renderiza a view add, passando os resultados da consulta
            return view('app.provider.add', ['provider' => $provider, 'msg' => $msg]);
        }
    }

    // criando a ação delete
    public function delete($id)
    {
        // consulta no BD, utilizando o id
        $provider = Provider::find($id);

        // se houver correspondência no BD
        if ($provider->id) {

            // remove o registro
            $provider->delete();
        }

        // redireciona para o início
        return redirect()->route('app.provider');
    }
}
