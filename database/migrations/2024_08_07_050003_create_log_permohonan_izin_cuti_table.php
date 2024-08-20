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
        Schema::create('log_permohonan_izin_cuti', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode_cuti', 100)->nullable();
            $table->string('username', 100)->nullable();
            $table->string('no_scan', 10)->nullable();
            $table->dateTime('tgl')->nullable();
            $table->string('ket_tambah_cuti', 128)->nullable();
            $table->string('ket_edit_cuti', 128)->nullable();
            $table->string('ket_hapus_cuti')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_permohonan_izin_cuti');
    }
};
