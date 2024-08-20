<?php

namespace App\Http\Controllers\EmployeeBirthday;

use App\Http\Controllers\Controller;
use App\Mail\BirthdayEmail;
use App\Models\Employe\Employe;
use Exception;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeBirthday extends Controller
{
    public function index()
    {
        $employee_birthday_list =  Employe::select('nama', 'email_pribadi', 'dept')
            ->whereRaw("DATEPART(MM, tgl_lahir) = DATEPART(MM, GETDATE())")
            ->whereRaw("DATEPART(DAY, tgl_lahir) = DATEPART(DAY, GETDATE())")
            ->where('status_aktif', '!=', 0)
            ->get();

        return view('employee_birthday.employee_birthday', compact('employee_birthday_list'));
    }

    public function sendMailEmployeeBirthday(Request $request, ToastrFactory $flasher)
    {
        try {
            // Validasi apakah ada checkbox yang dipilih
            $request->validate([
                'emails' => 'required|array|min:1',
            ]);

            $emails = $request->emails;

            foreach ($emails as $email) {
                Mail::to($email)
                    ->send(new BirthdayEmail());
            }

            // Toast sukses
            $flasher->addSuccess('Success sending email');
        } catch (Exception $e) {
            // Tangani kesalahan dan tampilkan pesan kesalahan
            $flasher->addError('Error sending email: ' . $e->getMessage());
        }

        return back();
    }
}
