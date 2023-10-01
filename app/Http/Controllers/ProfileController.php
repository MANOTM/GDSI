<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile(Request $re)
    { 
        return view('profile.profile');
    }
    public function edit(User $user,Request $request)
    {
        $request->validate([
            "name"=>'required',
            'email'=>'required',
            'password' => 'nullable|confirmed|min:4',
            'file'=>'image'
        ]);  
        
  
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now(),
        ]); 
        if($request->has('password')){
            $user->update([
                'password' => hash::make($request->password),
            ]);
        }
        if($request->has('file')){
            $avatarName = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('avatars'), $avatarName);
    
            $user->update(['avatar'=>$avatarName]);
            

        }
        return redirect()->back()->with('succes','تم تعديل المعلومات');
    }
}
