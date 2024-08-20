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
        Schema::create('data_pengalaman_kerja', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_scan')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('bagian')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('masa_kerja')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pengalaman_kerja');
    }
};
