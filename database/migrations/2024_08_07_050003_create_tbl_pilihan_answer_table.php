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
        Schema::create('tbl_pilihan_answer', function (Blueprint $table) {
            $table->integer('id_pilihan', true);
            $table->string('type_pilihan', 191);
            $table->string('value_pilihan', 191);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pilihan_answer');
    }
};
