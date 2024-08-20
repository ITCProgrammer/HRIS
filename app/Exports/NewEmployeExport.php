<?php

namespace App\Exports;

use App\Models\Employe\Employe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NewEmployeExport implements FromQuery, WithHeadings, WithStyles
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

    public function query()
    {
        $all_employes = Employe::select('no_scan', 'no_ktp', 'nama');

        if (!empty($this->from_date) && !empty($this->to_date)) {
            $all_employes = $all_employes->whereBetween('tgl_masuk', [$this->from_date, $this->to_date]);
        }

        if (!empty($this->department)) {
            $all_employes = $all_employes->where('dept', $this->department);
        }

        $all_employes = $all_employes->orderBy('tgl_masuk', 'DESC')->get();

        // Debugging: Check the data
        Log::info($all_employes);

        return  $all_employes;
    }

    public function headings(): array
    {
        return [
            ['No Scan', 'NIK', 'Nama Pegawai']
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true
                ]
            ],
        ];
    }
}
