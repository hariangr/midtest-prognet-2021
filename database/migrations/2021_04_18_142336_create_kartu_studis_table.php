<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuStudisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_studis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigInteger('mahasiswas_id')->unsigned();
            $table->foreign('mahasiswas_id')->references('id')->on('mahasiswas')->onDelete('cascade');

            $table->bigInteger('kelas_id')->unsigned();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kartu_studis');
    }
}
