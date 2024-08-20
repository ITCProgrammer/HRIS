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
        Schema::create('im_karyawanbaru', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('memo')->nullable();
            $table->date('tgl')->nullable();
            $table->string('dept')->nullable();
            $table->string('dibuat_oleh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('im_karyawanbaru');
    }
};
