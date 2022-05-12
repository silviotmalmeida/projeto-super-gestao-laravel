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
        'unit_id'
    ];

    // implementando o relacionamento 1-1 com a tabela product_detail
    // o hasOne é utilizado na entidade forte, ou seja, a tabela que não contém a chave estrangeira
    // o primeiro argumento deve ser model da tabela fraca
    // o segundo argumento deve ser a fk na tabela fraca
    // o terceiro argumento deve ser a pk na tabela forte
    public function product_detail()
    {
        return $this->hasOne('App\ProductDetail', 'product_id', 'id');
    }

    // implementando o relacionamento N-1 com a tabela units
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
