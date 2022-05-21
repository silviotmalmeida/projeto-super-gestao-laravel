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
        'qtd' => 'required|integer',
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

        // obtendo os dados do produto incluído
        $product_id = $request->get('product_id');
        $qtd = $request->get('qtd');

        // verificando já existe este tipo de produto no pedido
        $order_product = new OrderProduct();
        $exists = $order_product->where('order_id', $order_id)->where('product_id', $product_id)->get()->first();

        // se existir
        if (isset($exists->product_id)) {

            // realiza a atualização da quantidade
            $exists->qtd += $qtd;

            // atualiza o registo no BD
            $exists->update();
        }
        // senão
        else {

            // insere o novo tipo de produto no pedido
            $order_product = new OrderProduct();
            $order_product->order_id = $order_id;
            $order_product->product_id = $product_id;
            $order_product->qtd = $qtd;
            $order_product->save();
        }

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
      
        // consulta no BD, utilizando o id
        $order_product = OrderProduct::find($id);

        // se não houver correspondência no BD
        if (!$order_product->id) {

            // renderiza a view index do pedido
            return redirect()->route('order.index');
        }
        // senão
        else {

            // obtendo o id do pedido
            $order_id = $order_product->order_id;

            // apagando o registro no BD
            $order_product->delete();

            // renderiza a view create
            return redirect()->route('order_product.create', $order_id);
        }
    }
}
