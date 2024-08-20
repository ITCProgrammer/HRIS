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
        Schema::create('data_keluarga', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_scan')->nullable();
            $table->string('nama')->nullable();
            $table->string('hubungan')->nullable();
            $table->string('tempat')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('pekerjaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_keluarga');
    }
};
