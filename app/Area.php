<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table = 'area';

    // não vou utilizar controle de alteração de registros
    public $timestamps = false;
}
