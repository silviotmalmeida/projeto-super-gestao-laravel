<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importando as models
use App\Order;
use App\Client;

class OrderController extends Controller
{

    // definição das validações de cada campo
    private $validationRules =
    [
        'client_id' => 'required|integer|exists:clients,id',
    ];

    // customização das mensagens de erro
    private $validationMessages =
    [
        'required' => 'O campo não pode ser vazio!',
        'integer' => 'O campo deve ser um número inteiro!',
        'client_id.exists' => 'Cliente inválido!',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // consulta no BD, considerando os relacionamentos com a model client, 
        // ordenando por id decrescente, paginando os registros
        $orders = Order::with(['client'])->orderBy('id', 'desc')->paginate(10);

        // renderiza a view index, passando os resultados da consulta e os parâmetros do request
        // o envio dos parâmetros do request possibilita a persistência dos filtros utilizados na paginação
        return view('app.order.index', ['orders' => $orders, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // obtendo os clientes cadastrados
        $clients = Client::all();

        // renderiza a view create, injetando os clientes
        return view('app.order.create', ['clients' => $clients]);
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
        $order = new Order();
        $order->create($request->all());

        // redireciona para a rota index
        return redirect()->route('order.index');
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
        $order = Order::find($id);

        // se não houver correspondência no BD
        if (!$order->id) {

            // renderiza a view index
            return redirect()->route('order.index');
        }
        // senão
        else {

            // renderiza a view add, passando os resultados da consulta
            return view('app.order.show', ['order' => $order]);
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
        $order = Order::find($id);

        // se não houver correspondência no BD
        if (!$order->id) {

            // renderiza a view index
            return redirect()->route('order.index');
        }
        // senão
        else {

            // obtendo os clientes cadastrados
            $clients = Client::all();

            // renderiza a view add, passando os resultados da consulta
            return view('app.order.create', ['order' => $order, 'clients' => $clients]);
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
        $order = Order::find($id);
        $order->update($request->all());

        // redireciona para a rota index
        return redirect()->route('order.show', ['order' => $order->id]);
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
        $order = Order::find($id);

        // se não houver correspondência no BD
        if (!$order->id) {

            // renderiza a view index
            return redirect()->route('order.index');
        }
        // senão
        else {

            // apagando o registro no BD
            $order->delete();

            // renderiza a view index
            return redirect()->route('order.index');
        }
    }
}
