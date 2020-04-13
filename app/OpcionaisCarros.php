<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcionaisCarros extends Model
{
    public function carros(){
        return $this->belongsTo('App\Carro','id');
    }

    public function opcinals(){
        return $this->belongsTo('App\Opcional','id');
    }
}
