<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `viewfeedback` AS select `a`.`id` AS `id`,`b`.`no_scan` AS `no_scan`,`b`.`nama` AS `nama`,`b`.`dept` AS `dept`,`c`.`no_scan` AS `no_scan2`,`c`.`nama` AS `nama2`,`c`.`dept` AS `dept2`,`a`.`feedback` AS `feedback`,`a`.`lokasi_feedback` AS `lokasi_feedback`,`a`.`tanggapan` AS `tanggapan`,`a`.`status` AS `status` from ((`hrd`.`feedback` `a` left join `hrd`.`tbl_makar` `b` on(`b`.`no_scan` = `a`.`nik`)) left join `hrd`.`tbl_makar` `c` on(`c`.`no_scan` = `a`.`nik2`))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `viewfeedback`");
    }
};
