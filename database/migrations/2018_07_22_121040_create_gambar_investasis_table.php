<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGambarInvestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_investasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gambar')->nullable();
            $table->integer('investasi_id')->nullable()->default(0);
            $table->string('utama')->nullable();
            $table->string('flag')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gambar_investasi');
    }
}
