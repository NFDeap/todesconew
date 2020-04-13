<?php

use Illuminate\Database\Seeder;
use App\Marca;

class MarcasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Marca::where('titulo','=','teste marca 1')->count();

        if($existe){
            $marca = Marca::where('titulo','=','teste marca 1')->first();
        }
        else{
            $marca = new Marca();
        }

        $marca->titulo = "teste marca 1";        
        $marca->save();
    }
}
