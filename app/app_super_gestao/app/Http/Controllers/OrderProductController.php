<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// importando as models
use App\Product;
use App\Order;
use App\OrderProduct;

class OrderProductController extends Controller
{

    // definição das validações de cada campo
    private $validationRules =
    [        
        'product_id' => 'required|integer|exists:products,id',
    ];

    // customização das mensagens de erro
    private $validationMessages =
    [
        'required' => 'O campo não pode ser vazio!',
        'integer' => 'O campo deve ser um número inteiro!',
        'product_id.exists' => 'Produto inválido!',
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
    public function create($order_id)
    {

        // consulta no BD, utilizando o id
        $order = Order::with('product')->find($order_id);

        // se não houver correspondência no BD
        if (!$order->id) {

            // renderiza a view index
            return redirect()->route('order.index');
        }
        // senão
        else {

            // obtendo os produtos cadastrados
            $products = Product::all();

            // renderiza a view create, injetando as unidades de medida
            return view('app.order_product.create', ['order' => $order, 'products' => $products]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $order_id)
    {
        
        // validando os dados recebidos do formulário
        $request->validate($this->validationRules, $this->validationMessages);

        // insere os dados no BD
        $order_product = new OrderProduct();
        $order_product->order_id = $order_id;
        $order_product->product_id = $request->get('product_id');
        $order_product->save();

        // redireciona para a rota create
        return redirect()->route('order_product.create', $order_id);
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
