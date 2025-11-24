<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    /**
     * Display a listing of the keyboards.
     */
    public function index()
    {
        $keyboards = Keyboard::all();

        return view('keyboards.index', compact('keyboards'));
    }

    /**
     * Show the form for creating a new keyboard.
     */
    public function create()
    {
        return view('keyboards.create');
    }

    /**
     * Store a newly created keyboard in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'layout' => 'required|array',
            'layout.*.*' => 'required|string',
        ]);

        $keyboard = Keyboard::create($validated);

        return redirect()->route('keyboards.index')
            ->with('success', 'Keyboard created successfully.');
    }

    /**
     * Display the specified keyboard.
     */
    public function show(Keyboard $keyboard)
    {
        return view('keyboards.show', compact('keyboard'));
    }

    /**
     * Show the form for editing the specified keyboard.
     */
    public function edit(Keyboard $keyboard)
    {
        return view('keyboards.edit', compact('keyboard'));
    }

    /**
     * Update the specified keyboard in storage.
     */
    public function update(Request $request, Keyboard $keyboard)
    {
        $validated = $request->validate([
            // Add your validation rules here
        ]);

        $keyboard->update($validated);

        return redirect()->route('keyboards.index')
            ->with('success', 'Keyboard updated successfully.');
    }

    /**
     * Remove the specified keyboard from storage.
     */
    public function destroy(Keyboard $keyboard)
    {
        $keyboard->delete();

        return redirect()->route('keyboards.index')
            ->with('success', 'Keyboard deleted successfully.');
    }
}
