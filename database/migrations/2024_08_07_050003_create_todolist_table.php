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
        Schema::create('todolist', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('tgl')->nullable();
            $table->string('nama')->nullable();
            $table->string('tugas', 1000)->nullable();
            $table->date('tgl_target')->nullable();
            $table->string('status')->nullable();
            $table->date('tgl_aktual')->nullable();
            $table->string('ket_status', 500)->nullable();
            $table->integer('point_plus')->nullable();
            $table->integer('point_min')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todolist');
    }
};
