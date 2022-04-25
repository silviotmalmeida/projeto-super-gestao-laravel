<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importando a model com os motivos de contato
use App\ContactReason;

// controller responsável pelas ações da rota /
class IndexController extends Controller
{
    // criando a ação index
    public function index()
    {
        // array para popular o option do formulário
        $reasons = ContactReason::all();

        // renderiza a view index, repassando os dados de option do formulário
        return view('site.index', ['reasons' => $reasons]);
    }
}
