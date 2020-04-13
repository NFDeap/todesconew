<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $table = "carros";

    protected $fillable = [
        'marca_id', 
        'modelo_id', 
        'titulo', 
        'preco', 
        'ano', 
        'portas', 
        'quilometragem', 
        'combustivel', 
        'placa', 
        'aceitaTroca', 
        'unicoDono', 
        'cambio', 
        'direcao', 
        'potenciaMotor', 
        'descricao',        
        'visualizacoes',
        'publicar',
        'imagem'        
    ];

    public function marca(){
        return $this->belongsTo('App\Marca','marca_id');
    }
    
    public function modelo(){
        return $this->belongsTo('App\Modelo','modelo_id');
    }

  /*   public function opcional(){
        return $this->belongsTo('App\Opcional','opcional_id');
    } */

    public function galeria(){
        return $this->hasMany('App\Galeria','carro_id');
    }
}
