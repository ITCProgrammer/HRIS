<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserModel\UserModel;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari data user dengan model
        $dataUser = User::orderBy('nama')->get();
        return view('user.user', ['dataUser' => $dataUser]);
    }
}
