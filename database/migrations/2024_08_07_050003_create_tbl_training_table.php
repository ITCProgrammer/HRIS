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
        Schema::create('tbl_training', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('no_scan')->index('no_scan');
            $table->string('kode_training')->nullable()->index('kode_training');
            $table->string('tgl_training', 20)->nullable()->index('tgl_training');
            $table->integer('durasi_jam')->nullable()->index('durasi_jam');
            $table->integer('trainer')->nullable();
            $table->string('nama_trainer', 100)->nullable();
            $table->string('external_trainer', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_training');
    }
};
