<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emisions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('observacion');
            $table->timestamp('fecha');
            $table->unsignedInteger('office_id');
            $table->foreign('office_id')->references('id')
                    ->on('offices')->onDelete('cascade');
            $table->unsignedInteger('document_id');
            $table->foreign('document_id')->references('id')
                    ->on('documents')->onDelete('cascade');
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
        Schema::dropIfExists('emisions');
    }
}
