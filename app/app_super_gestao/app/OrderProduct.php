<?php

namespace App;

// dependência default
use Illuminate\Database\Eloquent\Model;

// dependência para permitir recurso de soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    // habilitando o soft delete
    use SoftDeletes;

    ///definindo o nome da tabela no BD
    protected $table = 'order_products';

    // definindo os atributos a serem informados
    protected $fillable = [
        'order_id',
        'product_id',
    ];
}
