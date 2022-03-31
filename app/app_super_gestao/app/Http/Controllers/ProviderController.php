<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controller responsável pelas ações da rota /app/provider
class ProviderController extends Controller
{
    // criando a ação index
    public function index()
    {
        // renderiza a view index
        return view('app.provider.index');
    }
}
