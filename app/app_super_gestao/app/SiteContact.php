<?php

namespace App;

// dependĂȘncia default
use Illuminate\Database\Eloquent\Model;

// dependĂȘncia para permitir recurso de soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteContact extends Model
{
    // habilitando o soft delete
    use SoftDeletes;

    //definindo o nome da tabela no BD
    protected $table = 'site_contacts';

    // definindo os atributos a serem informados
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
        'contact_reasons_id'
    ];
}
