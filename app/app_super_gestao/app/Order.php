<?php

namespace App;

// dependência default
use Illuminate\Database\Eloquent\Model;

// dependência para permitir recurso de soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    // habilitando o soft delete
    use SoftDeletes;

    ///definindo o nome da tabela no BD
    protected $table = 'orders';

    // definindo os atributos a serem informados
    protected $fillable = [
        'client_id',
    ];

    // implementando o relacionamento N-1 com a model client
    // o belongsTo é utilizado na entidade fraca, ou seja, a tabela que contém a chave estrangeira
    // o primeiro argumento deve ser model da tabela forte
    // o segundo argumento deve ser a fk na tabela fraca
    // o terceiro argumento deve ser a pk na tabela forte
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }

    // implementando o relacionamento N-N com a model product
    // o primeiro argumento deve ser model da outra tabela
    // o segundo argumento deve ser a tabela de relacionamento
    // o terceiro argumento deve ser a fk desta tabela na tabela de relacionamento
    // o quarto argumento deve ser a fk da outra tabela na tabela de relacionamento
    public function product()
    {
        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id');
    }
}
