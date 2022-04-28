<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importando a model de usuários do laravel
use App\User;

class LoginController extends Controller
{
    // criando a ação index
    public function index(Request $request)
    {

        // obtendo o código do erro a partir da requisição
        $error = $request->get('error');

        // renderiza a view login, passando o parâmetro de erro de autenticação como true
        return view('site.login', ['error' => $error]);
    }

    // criando a ação authenticate
    public function authenticate(Request $request)
    {
        // validando os dados recebidos do formulário
        $request->validate(
            // definição das validações de cada campo
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            // customização das mensagens de erro
            [
                'required' => 'O campo não pode ser vazio!',
                'email' => 'O usuário deve ser um e-mail válido!',
            ]
        );

        // obtendo os dados do formulário
        $email = $request->get('email');
        $password = $request->get('password');

        // criando o objeto usuário do laravel
        $user = new User();
        // verificando se há correspondência para os dados do formulário no BD
        $exists = $user->where('email', $email)->where('password', $password)->get()->first();


        if (isset($exists->name)) {

            // inicia a sessão e cria os atributos nome e email
            session_start();
            $_SESSION['name'] = $exists->name;
            $_SESSION['email'] = $exists->email;

            // redireciona para a view client
            return redirect()->route('app.client');
        } else {

            // resetando a sessão
            session_start();
            unset($_SESSION['name']);
            unset($_SESSION['email']);

            // renderiza a view login, passando o código de erro de autenticação
            return redirect()->route('site.login', ['error' => 1]);
        }
    }
}
