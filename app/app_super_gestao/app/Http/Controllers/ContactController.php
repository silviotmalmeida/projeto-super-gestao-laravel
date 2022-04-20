<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controller responsável pelas ações da rota /contact
class ContactController extends Controller
{
    // criando a ação contact
    public function contact()
    {

        //HACK array temporário para popular o option do formulário
        $reasons = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação',
        ];

        // renderiza a view contact, repassando os dados de option do formulário
        return view('site.contact', ['reasons' => $reasons]);
    }

    // criando a ação contact
    public function save(Request $request)
    {

        echo "<pre>";
        print_r($request->all());
        echo "</pre>";

        // renderiza a view contact
        return view('site.contact');
    }
}
