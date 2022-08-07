<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Crypt;

class RegisterControler extends Controller
{
    public function index(){
        return view ('register.new',[
            'title'=>'login'
        ]);
    }

    public function store(Request $request){
        // return $request->all();
        $validatedData  = $request->validate([
            'name' =>'required|max:50|min:5',
            'username'=> ['required', 'min:5', 'max:25','unique:users'],
            'email'=>['required', 'email:dns', 'unique:users'],
            'password'=>'required|min:5|max:20'
        ]);
        
        // $validatedData  = new user();
        // $validatedData ->name =$request->name;
        // $validatedData ->username =$request->username;
        // $validatedData ->email =$request->email;
        // $validatedData ->password = bcrypt($request->password);

        // $validatedData['password'] = Crypt::encryptString($request->password);
        $validatedData['password'] = bcrypt($request->password);
        // $validatedData['password'] = hash::make('Password');

        User::create($validatedData);

        
        return redirect ('/login')->with('success','Registration successfull ! please login');
        
        dd($validatedData);
        

        // $validatedData['password'] = bcrypt($validatedData['Password']);
        // $validatedData['password'] = hash::make('Password');
        // $validatedData['password'] = bcrypt('Password');


        // $request->session()->flash ('success','Registration successfull ! please login');
        

        // dd($validatedData);
    }
}
