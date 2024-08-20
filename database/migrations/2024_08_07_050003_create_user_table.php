<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('hrd')->create('hrd.user', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 128);
            $table->string('email', 128);
            $table->string('image', 128)->nullable();
            $table->string('password')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('is_active')->nullable();
            $table->integer('special_user')->nullable();
            $table->integer('date_created')->nullable();
            $table->integer('logged')->nullable();
            $table->integer('logged_tdl')->nullable();
            $table->integer('logged_reqApp')->nullable();
            $table->string('dept', 128)->nullable();
            $table->string('ket')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('hrd')->dropIfExists('hrd.user');
    }
};
