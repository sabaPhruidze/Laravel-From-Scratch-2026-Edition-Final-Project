<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email'=> ['required','string','email','max:255'],
            'password'=> ['required','string','min:5','max:255']
        ]);
        if(!Auth::attempt($attributes)){
            return back()
            ->withErrors(['password'=>'We were unable to authenticate you with the provided credentials'])
            ->withInput();
        };
        $request->session()->regenerate();
        return redirect()->intended('/')->with('success','You are now logged in');//session 
    }
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
