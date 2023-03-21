<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function authenticated(Request $request)
    {
        $request->validate([
            'registration_number' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($request->only('registration_number','password'))){
            return redirect()->route('portal.dashboard');
        }
        return redirect()->back()->withErrors('The Identifications doesn\'t match');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

}
