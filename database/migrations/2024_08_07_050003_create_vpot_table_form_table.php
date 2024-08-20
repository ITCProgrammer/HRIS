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
        Schema::create('vpot_table_form', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_question')->index('id_question');
            $table->integer('a_choice')->nullable()->index('a_choice');
            $table->integer('b_choice')->nullable()->index('b_choice');
            $table->integer('c_choice')->nullable()->index('c_choice');
            $table->integer('d_choice')->nullable()->index('d_choice');
            $table->string('title_quest', 191);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vpot_table_form');
    }
};
