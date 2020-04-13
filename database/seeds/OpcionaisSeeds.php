<?php

use Illuminate\Database\Seeder;
use App\Opcional;

class OpcionaisSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Opcional::where('tituloOpcional','=','teste op 1')->count();

        if($existe){
            $opcional = Opcional::where('tituloOpcional','=','teste op 1')->first();
        }
        else{
            $opcional = new Opcional();
        }

        $opcional->tituloOpcional = "teste op 1";        
        $opcional->save();
    }
}
