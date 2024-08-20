<?php

namespace App\Http\Controllers\NewEmployeController;

use App\Exports\NewEmployeExport;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Employe\Employe;
use App\Models\Department\Department;
use App\Mail\EvaluationEmail;
use Illuminate\Support\Facades\Mail;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class NewEmployeController extends Controller
{
    public function index(Request $request)
    {
        $depts = Department::select('code')->get();

        $user = Auth::user()->username;
        $dept = Auth::user()->dept;

        // Memastikan informasi `user` ada di session
        if (!$user || !$dept) {
            return response()->json(['error' => 'User or department information is missing from the session'], 400);
        }

        if ($user == "iso.hrd") {
            $dept_employes = Employe::select([
                'no_scan',
                'nama',
                'dept',
                'tgl_masuk',
                'tgl_evaluasi',
                DB::raw("FORMAT(tgl_masuk, 'dd MMMM yyyy') AS ftgl_masuk"),
                DB::raw("CASE 
                                WHEN tgl_evaluasi IS NOT NULL AND tgl_evaluasi <> '' THEN FORMAT(tgl_evaluasi, 'dd MMMM yyyy') 
                                ELSE '-' 
                             END AS ftgl_evaluasi"),
                'jabatan',
                'status_email_kontrak'
            ])
                ->whereNotIn('status_karyawan', ['Resigned', 'perubahan_status'])
                ->whereBetween('tgl_evaluasi', ['2024-03-03', DB::raw('DATEADD(MONTH, 12, tgl_evaluasi)')])
                ->where('status_email_kontrak', 2)
                ->orderBy('tgl_masuk', 'DESC')
                ->get();
        } else {
            $dept_employes = Employe::select([
                'no_scan',
                'nama',
                'dept',
                'tgl_masuk',
                'tgl_evaluasi',
                DB::raw("FORMAT(tgl_masuk, 'dd MMMM yyyy') AS ftgl_masuk"),
                DB::raw("CASE 
                                WHEN tgl_evaluasi IS NOT NULL AND tgl_evaluasi <> '' THEN FORMAT(tgl_evaluasi, 'dd MMMM yyyy') 
                                ELSE '-' 
                             END AS ftgl_evaluasi"),
                'jabatan',
                'status_email_kontrak'
            ])
                ->whereNotIn('status_karyawan', ['Resigned', 'perubahan_status'])
                ->whereBetween('tgl_evaluasi', ['2024-03-03', DB::raw('DATEADD(MONTH, 12, tgl_evaluasi)')])
                ->where('dept', $dept)
                ->orderBy('tgl_masuk', 'DESC')
                ->get();
        }

        if ($request->ajax()) {
            $all_employes = Employe::select([
                'no_scan',
                'nama',
                'dept',
                'tgl_masuk',
                'tgl_evaluasi',
                DB::raw("FORMAT(tgl_masuk, 'dd MMMM yyyy') AS ftgl_masuk"),
                DB::raw("CASE 
                        WHEN tgl_evaluasi IS NOT NULL AND tgl_evaluasi <> '' THEN FORMAT(tgl_evaluasi, 'dd MMMM yyyy') 
                        ELSE '-' 
                     END AS ftgl_evaluasi"),
                'jabatan',
                'status_email_kontrak'
            ])
                ->whereNotIn('status_karyawan', ['Resigned', 'perubahan_status'])
                ->whereBetween('tgl_evaluasi', ['2024-03-03', DB::raw('DATEADD(MONTH, 12, tgl_evaluasi)')])
                ->whereNull('status_email_kontrak');

            if ($request->from_date != '' && $request->to_date != '') {
                $all_employes = $all_employes->whereBetween('tgl_masuk', [$request->from_date, $request->to_date]);
            }

            if ($request->department != '') {
                $all_employes = $all_employes->where('dept', $request->department);
            }

            $all_employes = $all_employes->orderBy('tgl_masuk', 'DESC')->get();

            return DataTables::of($all_employes)->addIndexColumn()->make(true);
        }

        return view('new_employe.new_employe', compact('dept_employes', 'depts'));
    }

    public function sendMailNewEmploye(Request $request, ToastrFactory $flasher)
    {
        try {
            // Validasi apakah ada checkbox yang dipilih
            $request->validate([
                'no_scan' => 'required|array|min:1',
                'no_scan.*' => 'string'
            ]);

            // Mengambil array nilai checkbox yang dipilih
            $selectedItems = $request->input('no_scan', []);

            // Konversi array string menjadi array asosiatif
            $data_employe = array_map(function ($item) {
                list($no_scan, $nama, $dept, $tgl_masuk, $tgl_evaluasi, $jabatan) = explode('/', $item);
                return [
                    'no_scan' => $no_scan,
                    'nama' => $nama,
                    'dept' => $dept,
                    'tgl_masuk' => $tgl_masuk,
                    'tgl_evaluasi' => $tgl_evaluasi,
                    'jabatan' => $jabatan,
                ];
            }, $selectedItems);

            // Ambil semua departemen dari data employe
            $departments = array_column($data_employe, 'dept');

            // Ambil semua no scan dari data employe
            $no_scans = array_column($data_employe, 'no_scan');

            // Hapus duplikasi departemen
            $unique_departments = array_unique($departments);

            if (count($unique_departments) > 1) {
                // Tangani kesalahan dan tampilkan pesan kesalahan
                $flasher->addError('Departemen yang dipilih tidak boleh berbeda!');
                return back(); // Kembali ke halaman sebelumnya
            }

            // Mengambil data dari tabel Employee dan DeptMail
            $query = DB::table('hrd.tbl_makar AS makar')
                ->leftJoin('hrd.dept_mail_2 AS dm', 'dm.code', '=', 'makar.dept')
                ->select(
                    'makar.no_scan',
                    'makar.nama',
                    'makar.dept',
                    'makar.jabatan',
                    'makar.tgl_masuk',
                    'makar.tgl_evaluasi',
                    'dm.dept_email1',
                    'dm.dept_email2',
                    'dm.dept_email3',
                    'dm.dept_email4',
                    'dm.dept_email5',
                    'dm.dept_email6',
                    'dm.dept_email7',
                    'dm.dept_email8',
                    'dm.dept_email9'
                )
                ->where('makar.dept', $unique_departments[0])
                ->first(); // Menggunakan first() untuk mendapatkan satu 

            // Mengambil email department dari hasil query
            $dept_email1 = $query->dept_email1;
            $dept_email2 = $query->dept_email2;
            $dept_email3 = $query->dept_email3;
            $dept_email4 = $query->dept_email4;

            if ($unique_departments[0] == 'MKT') {
                $cc_mail = [
                    'asep.pauji@indotaichen.com',
                    // 'stefanus.pranjana@indotaichen.com',
                    // 'Hrd@indotaichen.com',
                    // 'irwan.mulyadi@indotaichen.com',
                    // 'bunbun@indotaichen.com',
                    // 'bambang@indotaichen.com',
                    // 'frans@indotaichen.com',
                    // 'suhemi@indotaichen.com',
                    // $dept_email1,
                    // $dept_email2,
                    // $dept_email3,
                    // $dept_email4
                ];
            } else {
                $cc_mail = [
                    'asep.pauji@indotaichen.com',
                    // 'stefanus.pranjana@indotaichen.com',
                    // 'Hrd@indotaichen.com',
                    // $dept_email1,
                    // $dept_email2,
                    // $dept_email3,
                    // $dept_email4
                ];
            }

            // Kirim email
            // Iso.hrd@indotaichen.com
            Mail::to('ilham.hidayatullah@indotaichen.com')
                ->cc($cc_mail)
                ->send(new EvaluationEmail($data_employe));

            foreach ($no_scans as $scan) {
                Employe::where('no_scan', $scan)
                    ->update(['status_email_kontrak' => 2]);
            }

            // Toast sukses
            $flasher->addSuccess('Success sending email');
        } catch (Exception $e) {
            // Tangani kesalahan dan tampilkan pesan kesalahan
            $flasher->addError('Error sending email: ' . $e->getMessage());
        }

        return back();
    }

    public function exportExcelNewEmployee(Request $request, ToastrFactory $flasher)
    {
        try {
            if ($request->ajax()) {
                // Ambil parameter dari request
                $from_date = $request->from_date;
                $to_date = $request->to_date;
                $department = $request->department;

                // Buat instance dari NewEmployeExport dengan parameter
                $export = new NewEmployeExport($from_date, $to_date, $department);

                $excel_name = '';
                if (!empty($from_date) && !empty($to_date)) {
                    $excel_name = "Karyawan Baru periode $from_date - $to_date.xlsx";
                } else {
                    $excel_name = "Karyawan Baru semua periode.xlsx";
                }

                // Download file Excel
                return Excel::download($export, $excel_name);
            }
        } catch (Exception $e) {
            // Tangani kesalahan dan tampilkan pesan kesalahan
            Log::error($e->getMessage());
            $flasher->addError('Export excel failed: ' . $e->getMessage());
        }
    }
}
