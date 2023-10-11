<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/logout';

    public function login_show()
    {
        return view('auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
 
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('list_province');
            }else {
                return redirect()->route('/');
            }
        } else {
            return redirect()->route('login.show')->with('message', 'Email หรือ รหัสผ่านไม่ถูกต้อง');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.show');
    }
}
