<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigovotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigovotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lista')->references('id')->on('listas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_codigo')->references('id')->on('codigos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('codigovotos');
    }
}
