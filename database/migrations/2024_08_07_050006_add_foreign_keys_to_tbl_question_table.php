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
        Schema::table('tbl_question', function (Blueprint $table) {
            $table->foreign(['id_jenis_jawaban'], 'tbl_question_ibfk_1')->references(['id_jenis_jawaban'])->on('tbl_jenis_jawab')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['id_kategori_question'], 'tbl_question_ibfk_2')->references(['id_kategori_question'])->on('tbl_kategori_question')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_question', function (Blueprint $table) {
            $table->dropForeign('tbl_question_ibfk_1');
            $table->dropForeign('tbl_question_ibfk_2');
        });
    }
};
