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
        Schema::create('log_hacked', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username', 128)->nullable();
            $table->integer('date')->nullable();
            $table->string('ip_address', 128)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_hacked');
    }
};
