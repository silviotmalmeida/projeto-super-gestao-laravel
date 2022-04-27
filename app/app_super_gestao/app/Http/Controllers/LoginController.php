<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importando a model de usuários do laravel
use App\User;

class LoginController extends Controller
{
    // criando a ação index
    public function index()
    {
        // renderiza a view login
        return view('site.login');
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

            echo "usuário existe";
        } else {

            echo "usuário não existe";
        }
    }
}
