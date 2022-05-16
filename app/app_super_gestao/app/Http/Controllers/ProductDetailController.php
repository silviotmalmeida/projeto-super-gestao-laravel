<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importando as models
use App\Product;
use App\Unit;
use App\ProductDetail;

class ProductDetailController extends Controller
{

    // definição das validações de cada campo
    private $validationRules =
    [
        'lenght' => 'required|numeric|between:0,1000',
        'width' => 'required|numeric|between:0,1000',
        'height' => 'required|numeric|between:0,1000',
        'product_id' => 'required|integer|exists:products,id|unique:products',
        'unit_id' => 'required|integer|exists:units,id',
    ];

    // customização das mensagens de erro
    private $validationMessages =
    [
        'required' => 'O campo não pode ser vazio!',
        'numeric' => 'O campo deve ser um número!',
        'between' => 'O campo deve ser um número entre 0 e 1000!',
        'integer' => 'O campo deve ser um número inteiro!',
        'product_id.exists' => 'Produto inválido!',
        'product_id.unique' => 'Produto já utilizado!',
        'unit_id.exists' => 'Unidade de medida inválida!',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // obtendo os produtos cadastrados
        $products = Product::all();

        // renderiza a view create, injetando as unidades de medida
        return view('app.product_detail.create', ['units' => $units, 'products' => $products]);
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
        $product_detail = new ProductDetail();
        $product_detail->create($request->all());

        // redireciona para a rota index
        return redirect()->route('product_detail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // consulta no BD, considerando o relacionamento com a tabela products, utilizando o id
        $product_detail = ProductDetail::with(['product'])->find($id);

        // se não houver correspondência no BD
        if (!$product_detail->id) {

            // renderiza a view index
            return redirect()->route('product_detail.index');
        }
        // senão
        else {

            // obtendo as unidades de medida cadastradas
            $units = Unit::all();

            // obtendo os produtos cadastrados
            $products = Product::all();

            // renderiza a view add, passando os resultados da consulta
            return view('app.product_detail.create', ['product_detail' => $product_detail, 'units' => $units, 'products' => $products]);
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
        $product_detail = ProductDetail::find($id);
        $product_detail->update($request->all());

        // redireciona para a rota index
        return redirect()->route('product.show', ['product_detail' => $product_detail->id]);
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
        $product_detail = ProductDetail::find($id);

        // se não houver correspondência no BD
        if (!$product_detail->id) {

            // renderiza a view index
            return redirect()->route('product_detail.index');
        }
        // senão
        else {

            // apagando o registro no BD
            $product_detail->delete();

            // renderiza a view index
            return redirect()->route('product_detail.index');
        }
    }
}
