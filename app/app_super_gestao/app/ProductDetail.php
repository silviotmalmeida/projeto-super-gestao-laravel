<?php

namespace App;

// dependência default
use Illuminate\Database\Eloquent\Model;

// dependência para permitir recurso de soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    // habilitando o soft delete
    use SoftDeletes;
    
    ///definindo o nome da tabela no BD
    protected $table = 'product_detail';

    // definindo os atributos a serem informados
    protected $fillable = [
        'lenght',
        'width',
        'height',
        'product_id',
        'unit_id'
    ];
}