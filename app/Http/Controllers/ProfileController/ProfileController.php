<?php

namespace App\Http\Controllers\ProfileController;

use App\Http\Controllers\Controller;
use Exception;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('auth.profile');
    }

    public function changePassword()
    {
        return view('auth.change_password');
    }

    public function changeProfile(Request $request, ToastrFactory $flasher)
    {

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = auth()->user();

        try {
            if ($request->hasFile('foto')) {
                // Hapus gambar lama jika ada
                if ($user->image) {
                    Storage::delete($user->image);
                }

                // Simpan gambar baru
                $path = $request->file('foto')->store('profile');

                // Perbarui jalur gambar di database
                $user->image = $path;
            }

            $user->save();

            $flasher->addSuccess('Profile updated successfully.');
        } catch (Exception $e) {
            // Tangani kesalahan dan tampilkan pesan kesalahan
            $flasher->addError('Error updating profile: ' . $e->getMessage());
        }

        return back();
    }
}
