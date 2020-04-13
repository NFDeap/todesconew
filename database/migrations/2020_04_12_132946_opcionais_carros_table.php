<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OpcionaisCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcionais_carros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_opcional');
            $table->integer('id_carro');            
            $table->foreign("id_opcional")
                ->references('id')
                ->on('opcionals'); 
            $table->foreign("id_carro")
                ->references('id')
                ->on('carros'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
