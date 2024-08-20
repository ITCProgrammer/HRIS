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
        Schema::create('tantangan_pekerjaan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_jobdesc')->nullable();
            $table->string('tantangan_pekerjaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tantangan_pekerjaan');
    }
};
