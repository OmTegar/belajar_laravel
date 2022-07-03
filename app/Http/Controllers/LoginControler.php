<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use  config\auth;


class LoginControler extends Controller
{
    public function login()
    {
        return view('login.index', [
            'title' => 'login'
        ]);
    }

    public function authenticate(request  $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);



        // if (auth::attempt(['email'=>$request->email,'password'=>$request->password] )){
        //     $request->session()->regenerate(); 
        //     return redirect()->intended('/dashboard');
        // }


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login error !');
    }
}
