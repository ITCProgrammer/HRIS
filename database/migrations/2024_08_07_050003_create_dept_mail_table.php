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
        Schema::create('dept_mail', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code')->nullable();
            $table->string('dept_email2', 100)->nullable();
            $table->string('dept_email3', 100)->nullable();
            $table->string('dept_email4', 100)->nullable();
            $table->string('dept_email5', 100)->nullable();
            $table->string('dept_email1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dept_mail');
    }
};
