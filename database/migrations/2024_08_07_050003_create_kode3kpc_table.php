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
        Schema::create('kode3kpc', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode3')->nullable();
            $table->string('kpi_company_kpc')->nullable();
            $table->string('ket_kpc')->nullable();
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
        Schema::dropIfExists('kode3kpc');
    }
};
