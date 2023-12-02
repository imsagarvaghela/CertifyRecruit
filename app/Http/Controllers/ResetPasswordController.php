<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = Password::reset($request->only(
            'email', 'password', 'password_confirmation', 'token'
        ), function ($user, $password) {
            $user->forceFill([
                'password' => bcrypt($password)
            ])->save();
        });

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Password has been reset successfully!');
        } else {
            return back()->withErrors(['email' => trans($response)]);
        }
    }
}
