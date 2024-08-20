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
        Schema::create('kpi_individu', function (Blueprint $table) {
            $table->integer('id', true)->index('id');
            $table->string('kode6')->nullable()->index('kode6');
            $table->date('tgl')->nullable()->index('tgl');
            $table->string('no_scan')->nullable()->index('no_scan');
            $table->string('no_scan_atasan')->nullable()->index('no_scan_atasan');
            $table->string('kode5kpd')->nullable()->index('kode5kpd');
            $table->string('target1')->nullable();
            $table->string('ket1')->nullable();

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
        Schema::dropIfExists('kpi_individu');
    }
};
