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
        Schema::create('laporan_kpi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kode8')->nullable();
            $table->string('kode7')->nullable();
            $table->date('tgl')->nullable();
            $table->string('no_scan')->nullable();
            $table->string('no_scan_atasan')->nullable();
            $table->string('kode5kpd')->nullable();
            $table->string('target1')->nullable();
            $table->string('ket1')->nullable();
            $table->string('aktual')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_kpi');
    }
};
