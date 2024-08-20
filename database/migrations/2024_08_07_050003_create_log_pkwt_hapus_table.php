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
        Schema::create('log_pkwt_hapus', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username', 128)->nullable();
            $table->string('no_scan', 100)->nullable();
            $table->dateTime('tgl')->nullable();
            $table->string('ket_hapus', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_pkwt_hapus');
    }
};
