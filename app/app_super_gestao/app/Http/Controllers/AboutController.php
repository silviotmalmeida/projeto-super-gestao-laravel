<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controller responsável pelas ações da rota /about
class AboutController extends Controller
{
    // criando a ação about
    public function about()
    {
        // renderiza a view about
        return view('site.about');
    }
}
