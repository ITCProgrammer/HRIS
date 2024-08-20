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
        Schema::create('training_needs_analiysis', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_training')->nullable();
            $table->string('dept', 20)->nullable();
            $table->string('level', 20)->nullable();
            $table->string('bulan', 5)->nullable();
            $table->string('mingguke', 10)->nullable();
            $table->string('no_scan', 10)->nullable();
            $table->string('diajukan_oleh_nama')->nullable();
            $table->string('diajukan_oleh_jabatan')->nullable();
            $table->date('diajukan_oleh_tanggal')->nullable();
            $table->string('diketahui_oleh_nama')->nullable();
            $table->string('diketahui_oleh_jabatan')->nullable();
            $table->date('diketahui_oleh_tanggal')->nullable();
            $table->string('disetujui_oleh_nama')->nullable();
            $table->string('disetujui_oleh_jabatan')->nullable();
            $table->date('disetujui_oleh_tanggal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_needs_analiysis');
    }
};
