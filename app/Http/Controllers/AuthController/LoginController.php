<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected function credentials(Request $request)
    {
        return ['name' => $request->{$this->username()}, 'password' => $request->password, 'is_active' => 1];
    }

    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $userStatus = Auth::User()->is_active;

            if ($userStatus == 1) {
                $request->session()->regenerate();

                return redirect()->intended('dashboard');
            } else {
                Auth::logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();
                return back()->with('accountNoActive', 'Login failed. Your account is not active please contact the admin.');
            }
        }
        return back()->with('loginError', 'Login failed. Please check your credentials and try again.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
