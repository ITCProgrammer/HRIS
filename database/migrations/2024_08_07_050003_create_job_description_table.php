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
        Schema::create('job_description', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('jabatan')->nullable();
            $table->string('bagian')->nullable();
            $table->string('no_scan')->nullable();
            $table->string('dept')->nullable();
            $table->string('struktur_organisasi')->nullable();
            $table->string('fungsi_utama_jabatan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('pengalaman')->nullable();
            $table->string('kompetensi_teknis')->nullable();
            $table->string('kompetensi_nonteknis')->nullable();
            $table->string('dipesiapkan_oleh')->nullable();
            $table->string('disetujui_oleh')->nullable();
            $table->string('diterima_oleh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_description');
    }
};
