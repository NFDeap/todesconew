<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Carro;
use App\Opcional;

class OpcionalController extends Controller
{
    public function index(){             
        $registros = Opcional::all();
        return view('admin.opcionais.index',compact('registros'));
    }


    public function adicionar(){
        return view('admin.opcionais.adicionar');
    }


    public function salvar(Request $request){
        $dados = $request->all();

        $registro = new Opcional();
        $registro->tituloOpcional = $dados['tituloOpcional'];
        $registro->save(); /* Metodo que salva no banco. */

        \Session::flash('mensagem',['msg'=>'Registro Criado com Sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.opcionais');
    }


    public function editar($id){
        $registro = Opcional::find($id);
        return view('admin.opcionais.editar', compact('registro'));
    }
    

    public function atualizar(Request $request, $id){
        $registro = Opcional::find($id);
        $dados = $request->all(); /* Receber todos os dados */                
        $registro->tituloOpcional = $dados['tituloOpcional'];
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro Atualizado com Sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.modelos');
    }


    public function deletar($id){
        
        if(Carro::where('opcional_id','=',$id)->count()){
            $msg = "Não é possível deletar esse registro! Esses carros (";
                $carros = Carro::where('opcional_id','=',$id)->get();
                foreach($carros as $carro){
                    $msg .= "Id('s):" . $carro->id . " " . "/";
                }
                $msg .= ") Estão relacionados.";
            
            \Session::flash('mensagem',['msg'=>$msg,'class'=>'red white-text']);

            return redirect()->route('admin.opcionais');    
        }
        
        Opcional::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro Deletado com Sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.opcionais');
    }
}
