<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\LanguageTag;
use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    /**
     * Display a listing of the keyboards.
     */
    public function index(Request $request)
    {
        $languageTagId = $request->query('language_tag');
        
        $query = Keyboard::query();
        
        if ($languageTagId) {
            // note: whereHas allows filtering based on related models
            // it takes an anonymous function to specify the conditions on the related model
            // 'use' is used to bring in the variable from the parent scope
            // in which the where clause filters keyboards that have the specified language tag
            $query->whereHas('languageTags', function ($q) use ($languageTagId) {
                $q->where('language_tags.id', $languageTagId);
            });
        }
        
        $keyboards = $query->orderBy('name')->get();
        $languageTags = LanguageTag::orderBy('name')->get();

        return view('keyboards.index', compact('keyboards', 'languageTags', 'languageTagId'));
    }

    /**
     * Display the authenticated user's keyboards.
     */
    public function myLayouts()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to view your layouts.');
        }

        $keyboards = Keyboard::where('user_id', auth()->id())->get();

        return view('keyboards.my-layouts', compact('keyboards'));
    }

    /**
     * Show the form for creating a new keyboard.
     */
    public function create()
    {
        // check if user is authenticated
        if (! auth()->check()) {
            return back()->with('status', 'You must be logged in to create a keyboard layout.');
        }

        // Use policy to authorize
        if (!auth()->user()->can('create', Keyboard::class)) {
            return redirect()->route('keyboards.index')->with('status', 'Admins cannot create keyboard layouts.');
        }

        $languageTags = \App\Models\LanguageTag::orderBy('name')->get();
        return view('keyboards.create', compact('languageTags'));
    }

    /**
     * Store a newly created keyboard in storage.
     */
    public function store(Request $request)
    {
        // Use policy to authorize
        if (!auth()->user()->can('create', Keyboard::class)) {
            return redirect()->route('keyboards.index')->with('status', 'Admins cannot create keyboard layouts.');
        }

        // note: I'm using the validate method on the request instance here per the Laravel docs
        // in stead of accessing the superglobals $_GET or $_POST directly
        // https://laravel.com/docs/12.x/validation#quick-writing-the-validation-logic
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'layout' => 'required|array',
            'layout.*.*' => 'required|string',
            'language_tags' => 'nullable|array',
            // check that each provided language tag exists in the language_tags table:
            'language_tags.*' => 'exists:language_tags,id',
        ]);

        // Check for duplicate characters in the layout!
        $duplicates = $this->getDuplicateKeys($validated['layout']);

        if (! empty($duplicates)) {
            return back()->withInput()->withErrors([
                // implode() joins array elements into a string with a separator
                'layout' => 'Each character can only be used once in the layout. Duplicate characters: '.implode(', ', array_keys($duplicates)),
            ]);
        }

        $validated['user_id'] = auth()->id();
        $keyboard = Keyboard::create($validated);

        // Attach language tags if provided
        if (isset($validated['language_tags'])) {
            // sync() is specifically used to update many-to-many relationships in
            // it updates the pivot table (keyboard_language_tag) to match exactly what's in the provided array
            $keyboard->languageTags()->sync($validated['language_tags']);
        }

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
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to edit a keyboard layout.');
        }

        // Use policy to authorize
        if (!auth()->user()->can('update', $keyboard)) {
            return redirect()->route('keyboards.show', $keyboard)
                ->with('status', 'You can only edit your own keyboard layouts.');
        }

        $languageTags = \App\Models\LanguageTag::orderBy('name')->get();
        return view('keyboards.edit', compact('keyboard', 'languageTags'));
    }

    /**
     * Update the specified keyboard in storage.
     */
    public function update(Request $request, Keyboard $keyboard)
    {
        // Use policy to authorize
        if (!auth()->user()->can('update', $keyboard)) {
            return redirect()->route('keyboards.show', $keyboard)
                ->with('status', 'You can only edit your own keyboard layouts.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'layout' => 'required|array',
            // *.* means every element in the array and every sub-element
            // so all the keys in the layout need to be single characters
            'layout.*.*' => 'required|string|size:1',
            'language_tags' => 'nullable|array',
            'language_tags.*' => 'exists:language_tags,id',
        ]);

        // Check for duplicate characters in the layout
        $duplicates = $this->getDuplicateKeys($validated['layout']);

        if (!empty($duplicates)) {
            return back()->withInput()->withErrors([
                'layout' => 'Each character can only be used once in the layout. Duplicate characters: '.implode(', ', array_keys($duplicates)),
            ]);
        }

        $keyboard->update($validated);

        // Sync language tags
        if (isset($validated['language_tags'])) {
            $keyboard->languageTags()->sync($validated['language_tags']);
        } else {
            $keyboard->languageTags()->sync([]);
        }

        return redirect()->route('keyboards.show', $keyboard)
            ->with('status', 'Keyboard updated successfully.');
    }

    /**
     * Remove the specified keyboard from storage.
     */
    public function destroy(Keyboard $keyboard)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to delete a keyboard layout.');
        }

        // Use policy to authorize
        if (!auth()->user()->can('delete', $keyboard)) {
            return redirect()->route('keyboards.show', $keyboard)
                ->with('status', 'You can only delete your own keyboard layouts.');
        }

        $keyboard->delete();

        return redirect()->route('keyboards.index')
            ->with('status', 'Keyboard layout deleted successfully.');
    }

    /**
     * Check for duplicate characters in the keyboard layout.
     *
     * @param array $layout
     * @return array Array of duplicate characters (empty if none)
     */
    private function getDuplicateKeys(array $layout)
    {
        $allKeys = [];
        foreach ($layout as $row) {
            foreach ($row as $key) {
                $allKeys[] = $key;
            }
        }

        // Count occurrences of each key and filter to get duplicates
        // source: https://gist.github.com/MontealegreLuis/5118639
        return array_filter(array_count_values($allKeys), function ($count) {
            return $count > 1;
        });
    }
}
