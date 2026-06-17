<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\EmailChangedNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $attributes = $request->validate([
            'name' => ['string', 'min:3', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', Password::defaults()],
        ]);

        $originalEmail = $user->email;

        if (! $request->filled('password')) {
            unset($attributes['password']);
        }

        $user->update($attributes);

        if ($originalEmail !== $user->email) {
            Notification::route('mail', $originalEmail)
                ->notify(new EmailChangedNotification($user, $originalEmail));
        }

        return redirect()->route('profile.edit')->with('success', 'Profile Updated');
    }
}
