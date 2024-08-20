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
        Schema::create('kode5kpd', function (Blueprint $table) {
            $table->integer('id', true)->index('id');
            $table->string('kode5')->nullable()->index('kode5');
            $table->string('kpi_dept')->nullable()->index('kpi_dept');
            $table->string('target')->nullable()->index('target');
            $table->string('dept')->nullable();
            $table->string('ket_kpd')->nullable();
            $table->string('kode4stn')->nullable();
            $table->string('kode3kpc')->nullable();
            $table->string('kode2sto')->nullable();
            $table->string('kode1bsc')->nullable();

            $table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kode5kpd');
    }
};
