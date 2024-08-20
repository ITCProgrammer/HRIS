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
        Schema::table('vpot_table_form', function (Blueprint $table) {
            $table->foreign(['id_question'], 'vpot_table_form_ibfk_1')->references(['id_question'])->on('tbl_question');
            $table->foreign(['b_choice'], 'vpot_table_form_ibfk_3')->references(['id_pilihan'])->on('tbl_pilihan_answer');
            $table->foreign(['d_choice'], 'vpot_table_form_ibfk_5')->references(['id_pilihan'])->on('tbl_pilihan_answer');
            $table->foreign(['a_choice'], 'vpot_table_form_ibfk_2')->references(['id_pilihan'])->on('tbl_pilihan_answer');
            $table->foreign(['c_choice'], 'vpot_table_form_ibfk_4')->references(['id_pilihan'])->on('tbl_pilihan_answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vpot_table_form', function (Blueprint $table) {
            $table->dropForeign('vpot_table_form_ibfk_1');
            $table->dropForeign('vpot_table_form_ibfk_3');
            $table->dropForeign('vpot_table_form_ibfk_5');
            $table->dropForeign('vpot_table_form_ibfk_2');
            $table->dropForeign('vpot_table_form_ibfk_4');
        });
    }
};
