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
        Schema::create('vpot_table_answer', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('no_scan');
            $table->integer('id_question');
            $table->integer('id_answer');
            $table->text('answer')->nullable();
            $table->text('explanation')->nullable();
            $table->string('title_quest', 191);
            $table->date('tgl_pengisian')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vpot_table_answer');
    }
};
