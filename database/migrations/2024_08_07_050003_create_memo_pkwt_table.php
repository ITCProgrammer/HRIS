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
        Schema::create('memo_pkwt', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nomor_memo', 50)->nullable();
            $table->date('periode_awal')->nullable();
            $table->date('periode_akhir')->nullable();
            $table->string('dibuat_oleh')->nullable();
            $table->string('mengetahui')->nullable();
            $table->string('menyetujui')->nullable();
            $table->string('jabatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memo_pkwt');
    }
};
