<?php

namespace App;

// dependência default
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

    // definindo o nome da tabela no BD
    protected $table = 'order_products';

    // definindo os atributos a serem informados
    protected $fillable = [
        'order_id',
        'product_id',
    ];
}
