<?php

namespace App;

// dependência default
use Illuminate\Database\Eloquent\Model;

// dependência para permitir recurso de soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    // habilitando o soft delete
    use SoftDeletes;

    // definindo o nome da tabela no BD
    protected $table = 'units';

    // definindo os atributos a serem informados
    protected $fillable = [
        'name',
        'description',
    ];

    // implementando o relacionamento 1-N com a model product
    // o hasMany é utilizado na entidade forte, ou seja, a tabela que não contém a chave estrangeira
    // o primeiro argumento deve ser model da tabela fraca
    // o segundo argumento deve ser a fk na tabela fraca
    // o terceiro argumento deve ser a pk na tabela forte
    public function product()
    {
        return $this->hasMany('App\Product', 'unit_id', 'id');
    }

    // implementando o relacionamento 1-N com a model productDetail
    // o hasMany é utilizado na entidade forte, ou seja, a tabela que não contém a chave estrangeira
    // o primeiro argumento deve ser model da tabela fraca
    // o segundo argumento deve ser a fk na tabela fraca
    // o terceiro argumento deve ser a pk na tabela forte
    public function product_detail()
    {
        return $this->hasMany('App\ProductDetail', 'unit_id', 'id');
    }
}
