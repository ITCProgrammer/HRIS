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
        Schema::create('dicipline', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('tgl_sp')->nullable();
            $table->string('no_scan')->nullable();
            $table->string('sp')->nullable();
            $table->string('alasan', 1502)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dicipline');
    }
};
