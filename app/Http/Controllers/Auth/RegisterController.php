<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|max:255',
            'username'=>'required|unique:users,username',
            'mobile'=>'required|digits:10',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed'
        ]);
            
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);

        Auth()->attempt($request->only('email','password'));

        return redirect()->route('dashboard');
    }
}
