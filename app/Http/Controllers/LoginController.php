<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function check(Request $request)
    {
        $input = $request->all();
        $email = $input['email'];
        $password = $input['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            } else if (Auth::user()->role == "customer") {
                return redirect('/');
            }
        } else {
            return redirect('/login')->with('errors', 'Email / password is invalid');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
