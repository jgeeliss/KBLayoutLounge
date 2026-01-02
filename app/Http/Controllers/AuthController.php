<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * handles the signup process when a brand new user creates their account for the first time.
 */
class AuthController extends Controller
{
    public function create()
    {
        return view('users.signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'user_alias' => 'required|string|min:3|max:15',
            'password' => 'required|confirmed|min:6',
            'birthday' => 'nullable|date|before:today',
            'about_me' => 'nullable|string|max:500',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (User::where('email', $request->get('email'))->first()) {
            return redirect()->back()->withErrors(['duplicate' => 'User with email "'.$request->get('email').'" already exists!'])->withInput();
        }

        if (User::where('user_alias', $request->get('user_alias'))->first()) {
            // note: ->withInput() ensures that all the data just submitted remains available on the next page load
            return redirect()->back()->withErrors(['duplicate' => 'User alias "'.$request->get('user_alias').'" is already taken!'])->withInput();
        }

        $user = new User;
        $user->email = $request->get('email');
        $user->user_alias = $request->get('user_alias');
        $user->password = Hash::make($request->get('password'));
        $user->birthday = $request->get('birthday');
        $user->about_me = $request->get('about_me');

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time().'_'.$user->user_alias.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('storage/profile_pictures'), $filename);
            $user->profile_picture = 'profile_pictures/'.$filename;
        }

        $user->save();
        Auth::login($user);

        return redirect()->route('home')->with('status', 'Welcome aboard '.$user->user_alias.', your account has been created!');
    }

    public function goToLogin()
    {
        return view('users.login');
    }

    public function storeLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // note: the $remember parameter controls the "remember me" functionality.
        // When set to true, Laravel will keep the user authenticated indefinitely (or until they manually log out)
        // source: https://kinsta.com/blog/laravel-authentication/
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            // By regenerating the session ID immediately after successful authentication,
            // you invalidate any session ID that might have been compromised before login:
            $request->session()->regenerate();

            return redirect()->route('home')->with('status', 'Welcome back, '.Auth::user()->user_alias.'!');
        }

        return redirect()->back()->withErrors(['invalid' => 'Email or password invalid!'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('home')->with('status', 'You have been logged out successfully.');
    }
}
