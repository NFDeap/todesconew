<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Carro;
use App\Contato;
use App\Galeria;
use App\Opcional;

use Illuminate\Support\Facades\DB;

class CarroController extends Controller
{
    public function index($id){

        $carro = Carro::find($id);
        $galeria = $carro->galeria()->orderBy('ordem')->get();
        $contatos = Contato::find(1);
        $opcionais = Opcional::all();

        $seo = [
            'titulo'=>$carro->titulo,
            'descricao'=>$carro->descricao,
            'imagem'=>asset($carro->imagem),            
            'url'=>route('site.carro',[$carro->id,str_slug($carro->titulo,'_')])
        ];

        $opcionais_carro_id = DB::table('opcionais_carros')
        ->select(DB::raw('*'))
        ->where('id_carro', $id)
        ->get();

        $op_array = array();
        
        foreach($opcionais_carro_id as $key => $value) {
            array_push($op_array, $value->id_opcional);            
        }           

        return view('site.carro',compact('carro','galeria','contatos','seo', 'op_array', 'opcionais'));
    }
}
