<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('auth.login');
    }
    public function store(Request $request)
    { 
        $validator=$request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user=['email'=>$request->email,'password'=>$request->password];
        $remember=$request->has('remember')?true:false;
        // $user = User::where('Email','=',$request->email)->first();
        // if($user && $user->password == $request->password){
        //     Auth::login($user);
        //     if(Auth::check()){
        //         return redirect('/');
        //     }else{
        //         return view('404');
        //     }
        // }
        if(Auth::attempt($user,$remember)){
            return redirect('/');
        } 
        return back()->with('status','البريد الإلكترونى أو كلمة السر غير صحيحة')->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
