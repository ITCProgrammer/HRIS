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
        Schema::create('daftar_lembur', function (Blueprint $table) {
            $table->integer('id', true)->index('id');
            $table->string('kode_lembur', 19)->nullable()->index('kode_lembur');
            $table->integer('id_pkl')->nullable()->index('id_pkl');
            $table->string('dept', 128)->nullable()->index('dept');
            $table->string('shift', 11)->nullable()->index('shift');
            $table->date('tanggal')->nullable()->index('tanggal');
            $table->string('nama', 128)->nullable()->index('nama');
            $table->integer('no_absen')->nullable()->index('no_absen');
            $table->string('waktu_lembur_start', 128)->nullable()->index('waktu_lembur_start');
            $table->string('waktu_lembur_stop', 128)->nullable()->index('waktu_lembur_stop');
            $table->string('istirahat', 128)->nullable()->index('istirahat');
            $table->string('total_jam_lembur', 128)->nullable()->index('total_jam_lembur');
            $table->string('keterangan')->nullable()->index('keterangan');
            $table->string('dibuat_oleh_nama', 128)->nullable()->index('dibuat_oleh_nama');
            $table->string('dibuat_oleh_jabatan', 128)->nullable()->index('dibuat_oleh_jabatan');
            $table->string('diperiksa_oleh_nama', 128)->nullable()->index('diperiksa_oleh_nama');
            $table->string('diperiksa_oleh_jabatan', 128)->nullable()->index('diperiksa_oleh_jabatan');
            $table->string('disetujui_oleh_nama', 128)->nullable()->index('disetujui_oleh_nama');
            $table->string('disetujui_oleh_jabatan', 128)->nullable()->index('disetujui_oleh_jabatan');
            $table->date('tanggal_ttd')->nullable()->index('tanggal_ttd');
            $table->date('tanggal_permohonan')->nullable()->index('tanggal_permohonan');
            $table->string('status', 50)->nullable()->index('status');
            $table->string('status_tipe_lembur', 100)->nullable();

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
        Schema::dropIfExists('daftar_lembur');
    }
};
