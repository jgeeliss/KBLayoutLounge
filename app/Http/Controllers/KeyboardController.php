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
        // check if user is authenticated
        if (!auth()->check()) {
            return back()->with('status', 'You must be logged in to create a keyboard layout.');
        }
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

        // Check for duplicate characters in the layout!
        $allKeys = [];
        foreach ($validated['layout'] as $row) {
            foreach ($row as $key) {
                $allKeys[] = $key;
            }
        }

        $duplicates = array_filter(array_count_values($allKeys), function ($count) {
            return $count > 1;
        });

        if (!empty($duplicates)) {
            return back()->withInput()->withErrors([
                'layout' => 'Each character can only be used once in the layout. Duplicate characters: ' . implode(', ', array_keys($duplicates))
            ]);
        }

        $validated['user_id'] = auth()->id();
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

    public function rate(Request $request, Keyboard $keyboard)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // note: this is a special eloquent method that will either update an existing or create a new one
        \App\Models\Rating::updateOrCreate(
            // first array is the conditions to find existing rating
            [
                'user_id' => auth()->id(),
                'keyboard_id' => $keyboard->id,
            ],
            // second array is the values to update or create
            [
                'rating' => $validated['rating'],
            ]
        );

        return back()->with('status', 'Rating submitted successfully!');
    }
}
