<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('throttle:50,1')->only('authenticate');
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showLoginVisualGrafisForm()
    {
        return view('auth.login_visualgrafis');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
            'aktif' => 1,
            'role_id' => [1, 2, 3]
        ])) {
//            Auth::logoutOtherDevices($request->password);
            return redirect()->intended('home');
        }
        return back()->with('failed', 'Login gagal, periksa kembali username atau password anda.');
    }

    public function authenticateVisualGrafis(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'aktif' => 1, 'role_id' => 4])) {
//            Auth::logoutOtherDevices($request->password);
            return redirect()->intended('home');
        }
        return back()->with('failed', 'Login gagal, periksa kembali username atau password anda.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

}
