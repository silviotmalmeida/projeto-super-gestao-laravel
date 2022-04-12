<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controller responsável pelas ações da rota /contact
class ContactController extends Controller
{
    // criando a ação contact
    public function contact()
    {

        var_dump($_POST);

        // renderiza a view contact
        return view('site.contact');
    }
}
