<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kontrak', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('no_scan')->nullable();
            $table->date('kontrak_awal');
            $table->date('kontrak_akhir');
            $table->integer('durasi')->nullable();
            $table->string('keterangan', 100);
            $table->string('gaji');
            $table->string('status');
            $table->integer('verifikasi')->nullable();
            $table->string('libur')->nullable();
            $table->string('uk', 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kontrak');
    }
};
