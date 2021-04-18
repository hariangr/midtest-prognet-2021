<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->char("class_name", 1);

            $table->boolean('is_ongoing')->default(false);

            $table->bigInteger('matkuls_id')->unsigned();
            $table->foreign('matkuls_id')->references('id')->on('matkuls')->onDelete('cascade');

            $table->bigInteger('dosens_id')->unsigned();
            $table->foreign('dosens_id')->references('id')->on('dosens')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
