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
        Schema::create('recruitment_seleksi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no', 20)->nullable();
            $table->date('tgl_panggil')->nullable();
            $table->string('nama')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('dept')->nullable();
            $table->string('sumber')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('level')->nullable();
            $table->string('jabatan_dilamar')->nullable();
            $table->date('int_hrd')->nullable();
            $table->string('hint_hrd', 6)->nullable();
            $table->date('psikotes')->nullable();
            $table->string('hpsikotes', 6)->nullable();
            $table->date('tes_lap')->nullable();
            $table->string('htes_lap', 6)->nullable();
            $table->date('int_user')->nullable();
            $table->string('hint_user', 6)->nullable();
            $table->date('offering')->nullable();
            $table->string('hoffering', 6)->nullable();
            $table->date('tgl_join')->nullable();
            $table->date('tgl_evaluasi')->nullable();
            $table->string('ket')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_seleksi');
    }
};
