<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // criando a ação index
    public function index()
    {
        // renderiza a view index
        return view('app.product');
    }
}
