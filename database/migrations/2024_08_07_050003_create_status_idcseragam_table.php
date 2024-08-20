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
        Schema::create('status_idcseragam', function (Blueprint $table) {
            $table->string('id', 100)->nullable();
            $table->string('status_seragam', 100)->nullable();
            $table->string('status_idcard', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_idcseragam');
    }
};
