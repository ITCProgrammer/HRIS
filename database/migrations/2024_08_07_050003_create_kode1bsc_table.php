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
        Schema::create('kode1bsc', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode1')->nullable();
            $table->string('perspective_bsc')->nullable();
            $table->string('ket_bsc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kode1bsc');
    }
};
