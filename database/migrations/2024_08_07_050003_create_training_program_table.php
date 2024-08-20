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
        Schema::create('training_program', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('kode_training')->nullable();
            $table->date('tanggal_training')->nullable();
            $table->string('dept')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_program');
    }
};
