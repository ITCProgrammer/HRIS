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
        Schema::create('disabled_ub', function (Blueprint $table) {
            $table->string('id', 10)->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('deskripsi', 100)->nullable();
            $table->string('disabled_ub', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disabled_ub');
    }
};
