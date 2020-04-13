<?php

use Illuminate\Database\Seeder;
use App\Modelo;

class ModelosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Modelo::where('titulo','=','teste modelo 1')->count();

        if($existe){
            $modelo = Modelo::where('titulo','=','teste modelo 1')->first();
        }
        else{
            $modelo = new Modelo();
        }

        $modelo->titulo = "teste modelo 1";        
        $modelo->save();
    }
}
