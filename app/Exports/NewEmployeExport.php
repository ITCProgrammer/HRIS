<?php

namespace App\Exports;

use App\Models\Employe\Employe;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class NewEmployeExport implements FromCollection, WithEvents, WithColumnFormatting, WithHeadings, WithMapping, WithStyles
{
    use Exportable;

    protected ?string $from_date;
    protected ?string $to_date;
    protected ?string $department;

    public function __construct(?string $from_date = null, ?string $to_date = null, ?string $department = null)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
        $this->department = $department;
    }

    public function collection()
    {
        $all_employes = Employe::select([
            'no_scan',
            'nik_krishand',
            'nama',
            DB::raw("LEFT(Nama, 
                      CASE 
                          WHEN CHARINDEX(' ', Nama) = 0 
                          THEN LEN(Nama) 
                          ELSE CHARINDEX(' ', Nama) - 1 
                      END) AS nama_inisial"),
            'tempat_lahir',
            DB::raw("FORMAT(CONVERT(date, tgl_lahir), 'dd MMMM yyyy') AS ftgl_lahir"),
            'npwp',
            'alamat_domisili',
            'alamat_ktp',
            DB::raw("CASE 
                        WHEN LEFT(no_hp, 1) != '0' 
                        THEN '0' + no_hp 
                        ELSE no_hp 
                    END AS no_hp"),
            'email_pribadi',
            'no_ktp',
            'pendidikan',
            'agama',
            'jabatan',
            'dept',
            'tgl_masuk',
            DB::raw("FORMAT(tgl_masuk, 'dd MMMM yyyy') AS ftgl_masuk"),
            DB::raw("FORMAT(tgl_resign, 'dd MMMM yyyy') AS ftgl_resign"),
            DB::raw("CASE 
                        WHEN tgl_evaluasi IS NOT NULL AND tgl_evaluasi <> '' 
                        THEN FORMAT(tgl_evaluasi, 'dd MMMM yyyy') 
                        ELSE '-' 
                    END AS ftgl_evaluasi"),
            DB::raw("CASE 
                        WHEN jenis_kelamin = 'Laki' THEN 'L' 
                        ELSE 'P' 
                    END AS fjenis_kelamin"),
            DB::raw("CASE 
                        WHEN status_kel = 'TK' THEN 'TK' 
                        ELSE 'K' 
                    END AS fstatus_kel"),
            DB::raw("CASE 
                        WHEN status_kel = 'TK' THEN '0' 
                        ELSE SUBSTRING(status_kel, 2, 1) 
                    END AS tanggungan")
        ])
            ->whereNotIn('status_karyawan', ['Resigned', 'perubahan_status'])
            ->whereBetween('tgl_evaluasi', ['2024-03-03', DB::raw('DATEADD(MONTH, 12, tgl_evaluasi)')])
            ->whereNull('status_email_kontrak');

        if (!empty($this->from_date) && !empty($this->to_date)) {
            $all_employes = $all_employes->whereBetween('tgl_masuk', [$this->from_date, $this->to_date]);
        }

        if (!empty($this->department)) {
            $all_employes = $all_employes->where('dept', $this->department);
        }

        $all_employes = $all_employes->orderBy('tgl_masuk', 'DESC')->get();

        return  $all_employes;
    }

    public function headings(): array
    {
        return [
            ['No Scan', 'NIK', 'Nama Pegawai', 'Inisial', 'Tempat Lahir', 'Tgl Lahir', 'NPWP', 'Tgl NPWP Terdaftar', 'Tgl Hitung Mulai Punya NPWP', 'Alamat Tinggal', 'Alamat Pajak', 'Kode Negara Untuk WNA', 'No Telepon', 'Email', 'No KTP', 'Pendidikan Terakhir', 'Agama', 'Jabatan Pajak', 'Jabatan', 'Cabang', 'Departemen', 'Section', 'Golongan', 'Grade', 'Cabang Bank', 'No Rekening', 'Atas Nama', 'Tgl Masuk', 'Tgl Berhenti', 'Masa Penghasilan Awal', 'Masa Penghasilan Akhir', 'Metode', 'Jenis Pegawai', 'Jenis Kelamin', 'Kebangsaan', 'Status Kawin', 'Tanggungan', 'Jenis Pegawai HRD', 'Status Kawin HRD', 'Tanggungan HRD']
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_NUMBER,
            'O' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function styles(Worksheet $sheet)
    {

        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $headerStyle =  [
            'font' => [
                'bold' => true,
            ],
        ];

        $highestColumn = $sheet->getHighestColumn();
        $highestRow = $sheet->getHighestRow();

        return [
            'A1:' . $highestColumn . $highestRow => $borderStyle,
            1 => $headerStyle
        ];
    }

    public function map($employee): array
    {
        return [
            $employee->no_scan,
            $employee->nik_krishand,
            $employee->nama,
            $employee->nama_inisial,
            $employee->tempat_lahir,
            $employee->ftgl_lahir,
            $employee->npwp,
            '', // Kolom Kosong 1
            '', // Kolom Kosong 2
            $employee->alamat_domisili,
            $employee->alamat_ktp,
            '', // Kolom Kosong 3
            $employee->no_hp,
            $employee->email_pribadi,
            $employee->no_ktp,
            $employee->pendidikan,
            $employee->agama,
            $employee->jabatan,
            '', // Kolom Kosong 4
            '', // Kolom Kosong 5
            $employee->dept,
            '', // Kolom Kosong 6
            '', // Kolom Kosong 7
            '', // Kolom Kosong 8
            '', // Kolom Kosong 9
            '', // Kolom Kosong 10
            '', // Kolom Kosong 11
            $employee->ftgl_masuk,
            $employee->ftgl_resign,
            '', // Kolom Kosong 12
            '', // Kolom Kosong 13
            '', // Kolom Kosong 14
            '', // Kolom Kosong 15
            $employee->fjenis_kelamin,
            '', // Kolom Kosong 16
            $employee->fstatus_kel,
            $employee->tanggungan,
            '', // Kolom Kosong 17
            '', // Kolom Kosong 18
            '', // Kolom Kosong 19
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Set column widths
                $sheet->getColumnDimension('C')->setWidth(35);
                $sheet->getColumnDimension('D')->setWidth(15);
                $sheet->getColumnDimension('E')->setWidth(17);
                $sheet->getColumnDimension('F')->setWidth(18);
                $sheet->getColumnDimension('G')->setWidth(18);
                $sheet->getColumnDimension('J')->setWidth(38);
                $sheet->getColumnDimension('K')->setWidth(100); // jika mau dua baris buat jadi 50
                $sheet->getColumnDimension('M')->setWidth(15);
                $sheet->getColumnDimension('N')->setWidth(35);
                $sheet->getColumnDimension('O')->setWidth(18);
                $sheet->getColumnDimension('P')->setWidth(11);
                $sheet->getColumnDimension('R')->setWidth(16);
                $sheet->getColumnDimension('U')->setWidth(12);
                $sheet->getColumnDimension('AB')->setWidth(16);
                $sheet->getColumnDimension('AH')->setWidth(12);
                $sheet->getColumnDimension('AJ')->setWidth(12);
                $sheet->getColumnDimension('AK')->setWidth(12);

                // Set row heights for all rows except the header
                // $highestRow = $sheet->getHighestRow();
                // foreach (range(2, $highestRow) as $row) {
                //     $sheet->getRowDimension($row)->setRowHeight(30);
                // }

            },
        ];
    }
}
