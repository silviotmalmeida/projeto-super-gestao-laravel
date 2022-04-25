<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importando a model com os motivos de contato
use App\ContactReason;

// importando a model a ser utilizada na persistencia
use App\SiteContact;

// controller responsável pelas ações da rota /contact
class ContactController extends Controller
{
    // criando a ação contact
    public function contact()
    {

        // array para popular o option do formulário
        $reasons = ContactReason::all();

        // renderiza a view contact, repassando os dados de option do formulário
        return view('site.contact', ['reasons' => $reasons]);
    }

    // criando a ação contact
    public function save(Request $request)
    {

        // validando os dados recebidos do formulário
        $request->validate([

            'name' => 'required|min:3|max:50',
            'phone' => 'required|min:11|max:20',
            'email' => 'required|email|max:80',
            'contact_reasons_id' => 'required',
            'message' => 'required|max:2000',
        ]);

        // persistindo os dados no BD
        SiteContact::create($request->all());
        
        // renderiza para a view index
        return redirect()->route('site.index');
    }
}
