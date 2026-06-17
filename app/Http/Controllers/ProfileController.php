<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit',[
            'user' =>Auth::user()
        ]);
    }
    public function update(Request $request)
    {
         $request->validate([
            'name' => ['string', 'min:3', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique('users', 'email')->ignore(Auth::id())],
            'password' => ['nullable',Password::defaults()],
        ]);
    }
}
