<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importando as models
use App\Client;

class ClientController extends Controller
{

    // definição das validações de cada campo
    private $validationRules =
    [
        'name' => 'required|min:3|max:50',
    ];

    // customização das mensagens de erro
    private $validationMessages =
    [
        'required' => 'O campo não pode ser vazio!',
        'name.min' => 'O campo nome não ter menos de 3 caracteres!',
        'name.max' => 'O campo nome não ter mais de 50 caracteres!',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // consulta no BD, considerando os relacionamentos com a models order, 
        // ordenando por id decrescente, paginando os registros
        $clients = Client::with(['order'])->orderBy('id', 'desc')->paginate(10);

        // renderiza a view index
        return view('app.client.index', ['clients' => $clients, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // renderiza a view create
        return view('app.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validando os dados recebidos do formulário
        $request->validate($this->validationRules, $this->validationMessages);

        // insere os dados no BD
        $client = new Client();
        $client->create($request->all());

        // redireciona para a rota index
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // consulta no BD, utilizando o id
        $client = Client::find($id);

        // se não houver correspondência no BD
        if (!$client->id) {

            // renderiza a view index
            return redirect()->route('client.index');
        }
        // senão
        else {

            // renderiza a view add, passando os resultados da consulta
            return view('app.client.show', ['client' => $client]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // consulta no BD, utilizando o id
        $client = Client::find($id);

        // se não houver correspondência no BD
        if (!$client->id) {

            // renderiza a view index
            return redirect()->route('client.index');
        }
        // senão
        else {

            // renderiza a view add, passando os resultados da consulta
            return view('app.client.create', ['client' => $client]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validando os dados recebidos do formulário
        $request->validate($this->validationRules, $this->validationMessages);

        // atualiza os dados no BD
        $client = Client::find($id);
        $client->update($request->all());

        // redireciona para a rota index
        return redirect()->route('client.show', ['client' => $client->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // consulta no BD, utilizando o id
        $client = Client::find($id);

        // se não houver correspondência no BD
        if (!$client->id) {

            // renderiza a view index
            return redirect()->route('client.index');
        }
        // senão
        else {

            // apagando o registro no BD
            $client->delete();

            // renderiza a view index
            return redirect()->route('client.index');
        }
    }
}
