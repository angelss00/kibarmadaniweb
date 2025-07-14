<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        } 

        return $this->sendFailedLoginResponse($request);
    }
    
    protected function sendFailedLoginResponse(Request $request) 
    {
        return redirect()->back()
        ->withInput($request->only('email'))
        ->with('error','Email atau passsword salah');
    }
    
}
