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
        DB::statement("CREATE VIEW `ganti kpi individu dept knt` AS select `a`.`id` AS `id`,`a`.`kode6` AS `kode6`,`a`.`tgl` AS `tgl`,`a`.`no_scan` AS `no_scan`,`a`.`no_scan_atasan` AS `no_scan_atasan`,`a`.`kode5kpd` AS `kode5kpd`,`a`.`target1` AS `target1`,`a`.`ket1` AS `ket1` from (`hrd`.`kpi_individu` `a` left join `hrd`.`tbl_makar` `b` on(`b`.`no_scan` = `a`.`no_scan`)) where `b`.`dept` = 'KNT'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `ganti kpi individu dept knt`");
    }
};
