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
        Schema::create('kode4stn', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode4')->nullable();
            $table->string('strategic_initiative_stn')->nullable();
            $table->string('uom')->nullable();
            $table->string('target')->nullable();
            $table->string('owner')->nullable();
            $table->string('ket_stn')->nullable();
            $table->string('kode3kpc')->nullable();
            $table->string('kode2sto')->nullable();
            $table->string('kode1bsc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kode4stn');
    }
};
