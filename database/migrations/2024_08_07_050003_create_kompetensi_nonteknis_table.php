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
        Schema::create('kompetensi_nonteknis', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_scan')->nullable();
            $table->string('kompetensi_nonteknis')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kompetensi_nonteknis');
    }
};
