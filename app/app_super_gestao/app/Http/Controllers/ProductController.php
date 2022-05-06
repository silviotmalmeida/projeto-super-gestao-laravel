<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importando as models
use App\Product;
use App\Unit;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // consulta no BD, ordenando por id decrescente, paginando os registros
        $products = Product::orderBy('id', 'desc')->paginate(10);

        // renderiza a view list, passando os resultados da consulta e os parâmetros do request
        // o envio dos parâmetros do request possibilita a persistência dos filtros utilizados na paginação
        return view('app.product.index', ['products' => $products, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // obtendo as unidades de medida cadastradas
        $units = Unit::all();

        // renderiza a view create, injetando as unidades de medida
        return view('app.product.create', ['units' => $units]);
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
        $request->validate(
            // definição das validações de cada campo
            [
                'name' => 'required|min:3|max:50',
                'description' => 'required|min:3|max:100',
                'weight' => 'required|numeric|between:0,1000',
                'unit_id' => 'required|integer|exists:units,id',
            ],
            // customização das mensagens de erro
            [
                'required' => 'O campo não pode ser vazio!',
                'name.min' => 'O campo nome não ter menos de 3 caracteres!',
                'name.max' => 'O campo nome não ter mais de 50 caracteres!',
                'description.min' => 'O campo nome não ter menos de 3 caracteres!',
                'description.max' => 'O campo nome não ter mais de 50 caracteres!',
                'numeric' => 'O campo deve ser um número!',
                'weight.between' => 'O campo deve ser um número entre 0 e 1000!',
                'integer' => 'O campo deve ser um número inteiro!',
                'unit_id.exists' => 'Unidade de medida inválida!',
            ]
        );

        // insere os dados no BD
        $product = new Product();
        $product->create($request->all());

        // redireciona para a rota index
        return redirect()->route('product.index');
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
        $product = Product::find($id);

        // se não houver correspondência no BD
        if (!$product->id) {

            // renderiza a view index
            return view('app.product.index');
        }
        // senão
        else {

            // renderiza a view add, passando os resultados da consulta
            return view('app.product.show', ['product' => $product]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
