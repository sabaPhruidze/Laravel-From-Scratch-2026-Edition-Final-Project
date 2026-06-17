<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

/*
* იღებს form-ის მონაცემებს
* ამოწმებს სწორია თუ არა
* ქმნის ახალ user-ს database-ში
* ავტომატურად აყვანინებს login-ს
* აბრუნებს მთავარ გვერდზე
*/
class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:5', 'max:255'],
        ]);

        $user = User::create([ // ეს ქმნის ახალ user-ს database-ში.
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        Auth::login($user);

        return to_route('ideas.index')->with('success', 'Your account has been created');
    }
}
