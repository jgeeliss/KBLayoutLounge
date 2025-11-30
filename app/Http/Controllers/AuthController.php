<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        ]);

        if (User::where('email', $request->get('email'))->first()) {
            return redirect()->back()->withErrors(['duplicate' => 'User with email "'.$request->get('email').'" already exists!'])->withInput();
        }

        if (User::where('user_alias', $request->get('user_alias'))->first()) {
            return redirect()->back()->withErrors(['duplicate' => 'User alias "'.$request->get('user_alias').'" is already taken!'])->withInput();
        }

        $user = new User;
        $user->email = $request->get('email');
        $user->user_alias = $request->get('user_alias');
        $user->password = Hash::make($request->get('password'));
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
        if (Auth::attempt($request->all('email', 'password'))) {
            $request->session()->regenerate();

            return redirect()->route('home')->with('status', 'Welcome back, '.Auth::user()->user_alias.'!');
        }

        return redirect()->back()->withErrors(['invalid' => 'User or password invalid!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flash('status', 'You are no longer logged in!');

        return redirect()->route('home')->with('status', 'You have been logged out successfully.');
    }
}
