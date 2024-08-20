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
        Schema::create('recruitment_permohonan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no', 20)->nullable();
            $table->date('tgl_fptk')->nullable();
            $table->string('sifat_permohonan')->nullable();
            $table->string('alasan')->nullable();
            $table->string('dept')->nullable();
            $table->string('level')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('total_need')->nullable();
            $table->string('total_fulfil')->nullable();
            $table->string('status')->nullable();
            $table->string('kode_gol')->nullable();
            $table->string('lt_target')->nullable();
            $table->date('tgl_target')->nullable();
            $table->date('tgl_aktual')->nullable();
            $table->date('tgl_join')->nullable();
            $table->string('nama_pelamar')->nullable();
            $table->string('ket')->nullable();
            $table->string('lulus_ojt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_permohonan');
    }
};
