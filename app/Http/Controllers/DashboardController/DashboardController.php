<?php

namespace App\Http\Controllers\DashboardController;

use App\Http\Controllers\Controller;
use App\Models\Employe\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jml_karyawan = Employe::where('status_karyawan', '!=', 'resigned')
            ->where('status_karyawan', '!=', 'perubahan_status')
            ->count();

        $jml_karyawan_pria = Employe::where('status_karyawan', '!=', 'resigned')
            ->where('status_karyawan', '!=', 'perubahan_status')
            ->where('jenis_kelamin', 'Laki')
            ->count();

        $jml_karyawan_wanita = Employe::where('status_karyawan', '!=', 'resigned')
            ->where('status_karyawan', '!=', 'perubahan_status')
            ->where('jenis_kelamin', 'wanita')
            ->count();

        // Menghitung jumlah karyawan dengan status tertentu berdasarkan departemen
        $tot_karyawan = DB::table('hrd.tbl_makar')
            ->join('hrd.dept', 'hrd.tbl_makar.dept', '=', 'dept.code')
            ->where('status_karyawan', '!=', 'resigned')
            ->where('status_karyawan', '!=', 'perubahan_status')
            ->select(DB::raw('dept,dept_name, COUNT(*) as total'))
            ->groupBy('dept', 'dept_name')
            ->orderBy('dept')
            ->get();
        return view('dashboard', compact('jml_karyawan', 'jml_karyawan_pria', 'jml_karyawan_wanita', 'tot_karyawan'));
    }
}
