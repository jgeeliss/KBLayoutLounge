<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

// source: https://kinsta.com/blog/laravel-authentication/

/**
 * Handles password reset functionality for users who forgot their password.
 */
class ForgotPasswordLinkController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('users.forgot-password');
    }

    // note: this method handles the submission of the forgot password form.
    // It validates the email, sends a password reset link, and provides feedback to the user.
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // note: this uses Laravel's built-in password reset functionality to send a password reset link
        // to a user's email address.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // note: depending on whether the reset link was sent successfully or not,
        // the user is redirected back with a status message.
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('users.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    // note: this method processes the password reset form submission.
    // It validates the input, resets the user's password, and provides feedback.
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $status = Password::reset(
            // only() retrieves a subset of the input data from the request. This ensures that only
            // the necessary fields are passed to the reset method which is safer.
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                // forceFill() is needed because the password field is not fillable by default.
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
