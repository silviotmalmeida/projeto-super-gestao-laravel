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

    // implementando o relacionamento 1-1 com a tabela products
    // o belongsTo é utilizado na entidade fraca, ou seja, a tabela que contém a chave estrangeira
    // o primeiro argumento deve ser model da tabela forte
    // o segundo argumento deve ser a fk na tabela fraca
    // o terceiro argumento deve ser a pk na tabela forte
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
