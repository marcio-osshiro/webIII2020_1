<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    //
    protected $table = 'professor';

    // não vou utilizar controle de alteração de registros
    public $timestamps = false;
}
