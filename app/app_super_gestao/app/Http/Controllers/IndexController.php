<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controller responsável pelas ações da rota /
class IndexController extends Controller
{
    // criando a ação index
    public function index()
    {
        //HACK array temporário para popular o option do formulário
        $reasons = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação',
        ];

        // renderiza a view index, repassando os dados de option do formulário
        return view('site.index', ['reasons' => $reasons]);
    }
}
