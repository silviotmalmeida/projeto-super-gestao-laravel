<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controller responsável pelas ações da rota /
class IndexController extends Controller
{
    // criando a ação index
    public function index()
    {
        // renderiza a view index
        return view('site.index');
    }
}
