<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestastorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investastor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->default(0);
            $table->string('nama');
            $table->string('email');
            $table->string('telp');
            $table->string('alamat');
            $table->integer('propinsi')->nullable()->default(0);
            $table->integer('kota_kab')->nullable()->default(0);
            $table->integer('kecamatan')->nullable()->default(0);
            $table->integer('kelurahan')->nullable()->default(0);
            $table->integer('kode_pos')->nullable()->default(0);
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->integer('no_ktp')->nullable()->default(0);
            $table->string('no_npwp')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('jenis')->nullable();
            $table->text('informasi_bank')->nullable();
            $table->integer('flag')->default(1);
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
        Schema::dropIfExists('investastor');
    }
}
