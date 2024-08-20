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
        Schema::create('kode2sto', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode2')->nullable();
            $table->string('strategic_obj_sto')->nullable();
            $table->string('ket_sto')->nullable();
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
        Schema::dropIfExists('kode2sto');
    }
};
