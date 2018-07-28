<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestasiKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investasi_kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kategori')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('slug')->nullable();
            $table->integer('flag')->nullable()->default(1);
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
        Schema::dropIfExists('investasi_kategori');
    }
}
