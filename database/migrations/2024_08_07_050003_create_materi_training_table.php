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
        Schema::create('materi_training', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode')->index('kode');
            $table->string('materi_training')->nullable();
            $table->string('jenis_training')->nullable();
            $table->string('penyelenggara')->nullable();
            $table->string('tempat')->nullable();
            $table->string('sertifikat')->nullable();

            $table->primary(['id', 'kode']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi_training');
    }
};
