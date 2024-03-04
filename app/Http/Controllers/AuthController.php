<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use session;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    
    public function loginUser(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:50',
        ]);
        $user = User::where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            $request->session()->put('loginId', $user->id);
            return redirect('/dashboard');
        } else{
            return back()->with('fail', 'Email not registered');
        }
}

public function logout()
    {
        Auth::logout();

        return redirect()->route('login'); // Redirect to the login page after logout
    }
}