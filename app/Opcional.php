<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcional extends Model
{
    public function carros(){
        return $this->hasMany('App\Carro','opcional_id');
    }
}
