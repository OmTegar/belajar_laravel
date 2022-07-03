<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\hash;

class RegisterControler extends Controller
{
    public function index(){
        return view ('register.new',[
            'title'=>'login'
        ]);
    }

    public function store(Request $request){
        // return $request->all();
        $validatedData= $request->validate([
            'name' =>'required|max:50|min:5',
            'username'=> ['required', 'min:5', 'max:25','unique:users'],
            'email'=>['required', 'email:dns', 'unique:users'],
            'password'=>'required|min:5|max:20'
            // 'password'=>['required', 'min:5', 'max:20']
        ]);
        // dd('registrasi berhasil');

        // $validatedData['password'] = bycrpt($validatedData['Password']);
        $validatedData['password'] = hash::make('Password');

        User::create($validatedData);

        // $request->session()->flash ('success','Registration successfull ! please login');
        return redirect ('/login')->with('success','Registration successfull ! please login');

        // dd($validatedData);
    }
}
