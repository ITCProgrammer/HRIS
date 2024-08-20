<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Flasher\Toastr\Prime\ToastrFactory;

class ChangePasswordController extends Controller
{
    public function updatePassword(Request $request, ToastrFactory $flasher)
    {

        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required'],
            'confirm_new_password' => ['required'],
        ]);

        $user = Auth::user();

        try {
            if (!Hash::check($request->old_password, $user->password)) {
                $flasher->addError('Your old password is wrong.');
                return back();
            } elseif ($request->new_password != $request->confirm_new_password) {
                $flasher->addError('New password and confirmation are not the same.');
                return back();
            }

            $user->password = Hash::make($request->new_password);
            /** @var \App\Models\User $user **/
            $user->save();

            $flasher->addSuccess('Password changed successfully.');
        } catch (Exception $e) {
            // Tangani kesalahan dan tampilkan pesan kesalahan
            $flasher->addError('Error changed password: ' . $e->getMessage());
        }

        return back();
    }
}
