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
        Schema::create('kec_kab_pro', function (Blueprint $table) {
            $table->integer('kode', true);
            $table->string('kecamatan', 128)->nullable();
            $table->string('kabupaten', 128)->nullable();
            $table->string('provinsi', 128)->nullable();
            $table->string('kode_pos', 128)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kec_kab_pro');
    }
};
