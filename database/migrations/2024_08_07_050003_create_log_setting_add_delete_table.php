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
        Schema::create('log_setting_add_delete', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username', 128)->nullable();
            $table->string('tgl', 50)->nullable();
            $table->string('kode', 128)->nullable();
            $table->string('keterangan', 128)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_setting_add_delete');
    }
};
