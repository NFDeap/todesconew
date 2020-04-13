<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Marca;
use App\Modelo;
use App\Carro;
use App\Contato;
use App\Opcional;
use App\OpcionaisCarros;

use Illuminate\Support\Facades\DB;

class CarroController extends Controller
{
    public function index(){        

        $registros = Carro::where('publicar','!=',null)->orderBy('id')->paginate(100000);    
        $paginacao = true;
        $contatos = Contato::find(1);
        return view('admin.carros.index',compact('registros','paginacao','contatos'));      
    
    }

    public function adicionar(){
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $opcionais = Opcional::all();
        $opcionais_carro  = null;

        return view('admin.carros.adicionar',compact('marcas','modelos', 'opcionais', 'opcionais_carro'));
    }

    public function editar($id){
        $registro = Carro::find($id);

       /*  var_dump($id);
        exit; */
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $opcionais = Opcional::all();               
        $opcionais_carro_id = DB::table('opcionais_carros')
        ->select(DB::raw('id_carro'))
        ->where('id', $id)                     
        ->get();  
        var_dump($opcionais_carro_id);
        exit;
        /* $opcionais_carro_id = DB::table('opcionais_carros')->where('id_carro', $id)->get(); */

        return view('admin.carros.editar',compact('registro','marcas','modelos', 'opcionais', 'opcionais_carro_id'));
    }

    public function salvar(Request $request){
        $registros = $request->all();

        $registro = new Carro();
        $registro->titulo = $registros['titulo'];
        $registro->preco = $registros['preco'];       
        $registro->ano = $registros['ano'];
        $registro->cor = $registros['cor'];
        $registro->portas = $registros['portas'];
        $registro->quilometragem = $registros['quilometragem'];
        $registro->combustivel = $registros['combustivel'];
        $registro->placa = $registros['placa'];
        $registro->aceitaTroca = $registros['aceitaTroca'];
        $registro->unicoDono = $registros['unicoDono'];
        $registro->cambio = $registros['cambio'];
        $registro->direcao = $registros['direcao'];
        $registro->potenciaMotor = $registros['potenciaMotor'];        
        $registro->descricao = $registros['descricao'];      

        $registro->visualizacoes = 0;
        $registro->publicar = $registros['publicar'];
        
        $registro->marca_id = $registros['marca_id'];
        $registro->modelo_id = $registros['modelo_id'];
        
        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/carros/".str_slug($registros['titulo'],'_')."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }

        /* $opcionais = Input::get('opcionais[]','value'); */      
    
        /* $registro->opcionais = $registros['opcionais'];
        if($registro->opcionais != null || $registro->opcionais != '') {
            foreach($registro->opcionais as $value){
                
            }            
        } */

        if(!is_numeric($registro->preco) || empty($registro->preco) || !is_numeric($registro->ano) || empty($registro->ano)){
            \Session::flash('mensagem',['msg'=>'Campo Numérico contendo caracteres!','class'=>'red white-text']);
            return redirect()->route('admin.carros');    
        }
        else{         
            $registro->save(); /* Metodo que salva no banco. */
            
        $opcionais_carros = $_POST['opcionais'];   
     /*    foreach($opcionais_carros as $value) {
                                                           
        }
        exit;         */
        


        foreach($opcionais_carros as $value){     
            $reg = new OpcionaisCarros();     
            $titles = DB::table('opcionals')
                ->select(DB::raw('tituloOpcional'))
                ->where('id', $value)                     
                ->get();            
                foreach($titles as $title){                                        
                    $reg->tituloOpcional = $title->tituloOpcional;
                    $reg->id_opcional = $value;
                    $reg->id_carro = $registro->id;
                    $reg->save();                    
                }                   
        }  

            \Session::flash('mensagem',['msg'=>'Registro Criado com Sucesso!','class'=>'green white-text']);
            return redirect()->route('admin.carros');
        }   
    }


    public function atualizar(Request $request, $id){
        $registro = Carro::find($id);

        $registros = $request->all();

        $registro->titulo = $registros['titulo'];
        $registro->preco = $registros['preco'];        
        $registro->ano = $registros['ano'];
        $registro->cor = $registros['cor'];
        $registro->portas = $registros['portas'];
        $registro->quilometragem = $registros['quilometragem'];
        $registro->combustivel = $registros['combustivel'];
        $registro->placa = $registros['placa'];
        $registro->aceitaTroca = $registros['aceitaTroca'];
        $registro->unicoDono = $registros['unicoDono'];
        $registro->cambio = $registros['cambio'];
        $registro->direcao = $registros['direcao'];
        $registro->potenciaMotor = $registros['potenciaMotor'];        
        $registro->descricao = $registros['descricao'];   
        
        $registro->publicar = $registros['publicar'];
        
        $registro->marca_id = $registros['marca_id'];
        $registro->modelo_id = $registros['modelo_id'];

        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/carros/".str_slug($registros['titulo'],'_')."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio, $nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }
                
        
        if(empty($_POST['opcionais']) == true) {
            $opcionais = 0;
                        
        } else {
            $opcionais = $_POST['opcionais'];
            
            foreach($opcionais as $value){     
                $reg = new OpcionaisCarros();              
                $reg->id_opcional = $value;
                $reg->id_carro = $registro->id;
                $reg->update();
            }    
            
        }                

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro Atualizado com Sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.carros');

    }
    
    public function deletar($id){
        Carro::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro Deletado com Sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.carros');
    }

}
