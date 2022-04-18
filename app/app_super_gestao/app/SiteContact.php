<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
    //definindo o nome da tabela no BD
    protected $table = 'site_contacts';

    // definindo os atributos a serem informados
    protected $fillable = [
        'name',
        'phone',
        'email',
        'reason',
        'message'
    ];
}
