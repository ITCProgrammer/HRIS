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
        Schema::create('user_sub_menu_tdl', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('menu_id')->nullable();
            $table->string('title', 128)->nullable();
            $table->string('url', 128)->nullable();
            $table->string('icon', 128)->nullable();
            $table->integer('is_active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_sub_menu_tdl');
    }
};
