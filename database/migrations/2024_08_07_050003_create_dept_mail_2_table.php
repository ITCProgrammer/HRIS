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
        Schema::create('dept_mail_2', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 25)->nullable();
            $table->string('dept_email1', 50)->nullable();
            $table->string('dept_email2', 50)->nullable();
            $table->string('dept_email3', 50)->nullable();
            $table->string('dept_email4', 50)->nullable();
            $table->string('dept_email5', 50)->nullable();
            $table->string('dept_email6', 50)->nullable();
            $table->string('dept_email7', 50)->nullable();
            $table->string('dept_email8', 50)->nullable();
            $table->string('dept_email9', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dept_mail_2');
    }
};
