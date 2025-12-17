<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of all users (admin only).
     */
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to access this page.');
        }

        // Use policy to authorize
        if (!auth()->user()->can('manageUsers', User::class)) {
            return redirect()->route('home')->with('status', 'You must be an admin to access this page.');
        }

        $users = User::orderBy('created_at', 'desc')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user (admin only).
     */
    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to access this page.');
        }

        // Use policy to authorize
        if (!auth()->user()->can('create', User::class)) {
            return redirect()->route('home')->with('status', 'You must be an admin to access this page.');
        }

        return view('users.create');
    }

    /**
     * Store a newly created user (admin only).
     */
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to perform this action.');
        }

        // Use policy to authorize
        if (!auth()->user()->can('create', User::class)) {
            return redirect()->route('home')->with('status', 'You must be an admin to perform this action.');
        }

        $request->validate([
            'email' => 'required|email|unique:users,email',
            'user_alias' => 'required|string|min:3|max:15|unique:users,user_alias',
            'password' => 'required|confirmed|min:6',
            'birthday' => 'nullable|date|before:today',
            'about_me' => 'nullable|string|max:500',
            'is_admin' => 'boolean',
        ]);

        $user = User::create([
            'email' => $request->email,
            'user_alias' => $request->user_alias,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            'about_me' => $request->about_me,
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('users.index')->with('status', "User {$user->user_alias} has been created successfully!");
    }

    /**
     * Toggle admin status for a user.
     */
    public function toggleAdmin(User $user)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to perform this action.');
        }

        // Use policy to authorize
        if (!auth()->user()->can('toggleAdmin', $user)) {
            return back()->with('status', 'You cannot perform this action.');
        }

        $user->is_admin = !$user->is_admin;
        $user->save();

        return back()->with('status', "Admin privileges updated for {$user->user_alias}.");
    }

    /**
     * Display a public user profile.
     */
    public function show(User $user)
    {
        // Load user's keyboards with ratings
        $keyboards = $user->keyboards()->withCount('ratings')->latest()->get();

        return view('users.show', compact('user', 'keyboards'));
    }

    /**
     * Show the form for editing the authenticated user's profile.
     */
    public function edit()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to access this page.');
        }

        $user = auth()->user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the authenticated user's profile.
     */
    public function update(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to perform this action.');
        }

        $user = auth()->user();

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'user_alias' => 'required|string|min:3|max:15|unique:users,user_alias,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
            'birthday' => 'nullable|date|before:today',
            'about_me' => 'nullable|string|max:500',
        ]);

        $user->email = $request->email;
        $user->user_alias = $request->user_alias;
        $user->birthday = $request->birthday;
        $user->about_me = $request->about_me;

        // Only update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.edit')->with('status', 'Your profile has been updated successfully!');
    }
}
