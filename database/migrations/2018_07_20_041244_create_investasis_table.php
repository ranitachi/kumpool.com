<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategori_id')->nullable()->default(0);
            $table->string('nama_investasi');
            $table->string('lokasi');
            $table->double('nominal')->nullable()->default(0);
            $table->integer('periode')->nullable()->default(0);
            $table->float('return')->nullable()->default(0);
            $table->integer('jumlah_unit')->default(1);
            $table->integer('flag')->default(1);
            $table->date('end_date')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('investasi');
    }
}
