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
        Schema::create('tbl_question', function (Blueprint $table) {
            $table->integer('id_question', true);
            $table->text('question');
            $table->integer('id_jenis_jawaban')->index('id_jenis_jawaban');
            $table->integer('id_kategori_question')->index('id_kategori_question');
            $table->string('title_quest', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_question');
    }
};
