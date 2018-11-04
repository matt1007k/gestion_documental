<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->char('cod_documento', 12);
            $table->string('titulo', 100);
            $table->text('asunto', 250)->nullable();
            $table->string('origen', 100);
            $table->string('destino', 100);
            $table->string('archivo', 200);
            $table->enum('estado', ['pendiente', 'atendido'])->default('pendiente');
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')
                    ->on('types')->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('documents');
    }

}
