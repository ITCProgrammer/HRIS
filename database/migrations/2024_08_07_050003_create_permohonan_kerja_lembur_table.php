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
        Schema::create('permohonan_kerja_lembur', function (Blueprint $table) {
            $table->integer('id', true)->index('id');
            $table->string('kode_lembur', 19)->index('kode_lembur');
            $table->string('dept', 128)->index('dept');
            $table->string('shift')->index('shift');
            $table->string('no_scan', 10)->index('no_scan');
            $table->string('nama', 128)->index('nama');
            $table->string('tujuan_lembur', 1000)->index('tujuan_lembur');
            $table->string('target_lembur', 128)->index('target_lembur');
            $table->string('tipe_lembur')->index('tipe_lembur');
            $table->string('jam', 1000)->index('jam');
            $table->string('penyebab_lembur')->index('penyebab_lembur');
            $table->string('dibuat_oleh_nama', 128)->index('dibuat_oleh_nama');
            $table->string('dibuat_oleh_jabatan', 128)->index('dibuat_oleh_jabatan');
            $table->string('diperiksa_oleh_nama', 128)->index('diperiksa_oleh_nama');
            $table->string('diperiksa_oleh_jabatan', 128)->index('diperiksa_oleh_jabatan');
            $table->string('ddpl_diketahui_nama', 128)->index('ddpl_diketahui_nama');
            $table->string('ddpl_diketahui_jabatan', 128)->index('ddpl_diketahui_jabatan');
            $table->string('dt_disetujui_nama', 128)->index('dt_disetujui_nama');
            $table->string('dt_disetujui_jabatan', 128);
            $table->date('tanggal')->nullable()->index('tanggal');
            $table->string('status', 50)->index('status');
            $table->string('status_tipe_lembur', 100);

            $table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonan_kerja_lembur');
    }
};
