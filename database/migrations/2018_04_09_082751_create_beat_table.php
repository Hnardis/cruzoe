<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beat', function (Blueprint $table){
           $table->increments('bea_id');
          
           $table->string('bea_nom');
           $table->string('bea_dureeExtrait')->nullable();
           $table->string('bea_cheminImage')->nullable();
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
        Schema::drop('beat');
    }
}
