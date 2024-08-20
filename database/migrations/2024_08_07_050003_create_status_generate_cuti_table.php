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
        Schema::create('status_generate_cuti', function (Blueprint $table) {
            $table->string('awal', 100)->nullable();
            $table->date('tgl_generate')->nullable();
            $table->string('status_generated', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_generate_cuti');
    }
};
