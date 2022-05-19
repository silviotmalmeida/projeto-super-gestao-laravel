<?php

namespace App;

// dependência default
use Illuminate\Database\Eloquent\Model;

// dependência para permitir recurso de soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // habilitando o soft delete
    use SoftDeletes;

    ///definindo o nome da tabela no BD
    protected $table = 'products';

    // definindo os atributos a serem informados
    protected $fillable = [
        'name',
        'description',
        'weight',
        'unit_id',
        'provider_id'
    ];

    // implementando o relacionamento N-1 com a model unit
    // o belongsTo é utilizado na entidade fraca, ou seja, a tabela que contém a chave estrangeira
    // o primeiro argumento deve ser model da tabela forte
    // o segundo argumento deve ser a fk na tabela fraca
    // o terceiro argumento deve ser a pk na tabela forte
    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unit_id', 'id');
    }

    // implementando o relacionamento N-1 com a model provider
    // o belongsTo é utilizado na entidade fraca, ou seja, a tabela que contém a chave estrangeira
    // o primeiro argumento deve ser model da tabela forte
    // o segundo argumento deve ser a fk na tabela fraca
    // o terceiro argumento deve ser a pk na tabela forte
    public function provider()
    {
        return $this->belongsTo('App\Provider', 'provider_id', 'id');
    }

    // implementando o relacionamento 1-1 com a model productDetail
    // o hasOne é utilizado na entidade forte, ou seja, a tabela que não contém a chave estrangeira
    // o primeiro argumento deve ser model da tabela fraca
    // o segundo argumento deve ser a fk na tabela fraca
    // o terceiro argumento deve ser a pk na tabela forte
    public function product_detail()
    {
        return $this->hasOne('App\ProductDetail', 'product_id', 'id');
    }

    // implementando o relacionamento N-N com a model order
    // o primeiro argumento deve ser model da outra tabela
    // o segundo argumento deve ser a tabela de relacionamento
    // o terceiro argumento deve ser a fk desta tabela na tabela de relacionamento
    // o quarto argumento deve ser a fk da outra tabela na tabela de relacionamento
    // dentro da função withPivot devem estar os atributos adicionais de interesse na tabela de relacionamento
    public function order()
    {
        return $this->belongsToMany('App\Order', 'order_products', 'product_id', 'order_id')->withPivot('qtd', 'created_at');
    }
}
