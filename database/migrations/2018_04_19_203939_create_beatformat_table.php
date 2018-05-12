<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeatformatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beatformat', function (Blueprint $table){
            $table->increments('bf_id');
            $table->string('bf_chemin');
            $table->string('bf_taille');
            $table->string('bf_prix');
            $table->timestamps();

            $table->unsignedInteger('id_format');
            $table->foreign('id_format')
                    ->references('for_id')
                    ->on('format')
                    ->onDelete('cascade');

            $table->unsignedInteger('id_beat');
            $table->foreign('id_beat')
                    ->references('bea_id')
                    ->on('beat')
                    ->onDelete('cascade');

            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('beatformat');
    }
}
