<?php

namespace App\Http\Controllers;

use App\Models\LanguageTag;
use Illuminate\Http\Request;

class LanguageTagController extends Controller
{
    /**
     * Display a listing of language tags.
     */
    public function index()
    {
        $languageTags = LanguageTag::orderBy('name')->get();

        return view('language-tags.index', compact('languageTags'));
    }

    /**
     * Show the form for creating a new language tag.
     */
    public function create()
    {
        if (! auth()->user()->can('create', LanguageTag::class)) {
            return redirect()->route('language-tags.index')
                ->with('status', 'You do not have permission to create language tags.');
        }

        return view('language-tags.create');
    }

    /**
     * Store a newly created language tag.
     */
    public function store(Request $request)
    {
        if (! auth()->user()->can('create', LanguageTag::class)) {
            return redirect()->route('language-tags.index')
                ->with('status', 'You do not have permission to create language tags.');
        }

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:language_tags,name',
            ]);

            LanguageTag::create($validated);

            return redirect()->route('language-tags.index')
                ->with('status', 'Language tag created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->with('status', 'A language tag with this name already exists.');
        }
    }

    /**
     * Display keyboards with a specific language tag.
     */
    public function show(LanguageTag $languageTag)
    {
        $keyboards = $languageTag->keyboards()->with('user', 'ratings')->get();

        return view('language-tags.show', compact('languageTag', 'keyboards'));
    }

    /**
     * Show the form for editing a language tag.
     */
    public function edit(LanguageTag $languageTag)
    {
        if (! auth()->user()->can('update', $languageTag)) {
            return redirect()->route('language-tags.index')
                ->with('status', 'You do not have permission to edit this language tag.');
        }

        return view('language-tags.edit', compact('languageTag'));
    }

    /**
     * Update the specified language tag.
     */
    public function update(Request $request, LanguageTag $languageTag)
    {
        if (! auth()->user()->can('update', $languageTag)) {
            return redirect()->route('language-tags.index')
                ->with('status', 'You do not have permission to update this language tag.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:language_tags,name,'.$languageTag->id,
        ]);

        $languageTag->update($validated);

        return redirect()->route('language-tags.index')
            ->with('status', 'Language tag updated successfully!');
    }

    /**
     * Remove the specified language tag.
     */
    public function destroy(LanguageTag $languageTag)
    {
        if (! auth()->user()->can('delete', $languageTag)) {
            return redirect()->route('language-tags.index')
                ->with('status', 'You do not have permission to delete this language tag.');
        }

        $languageTag->delete();

        return redirect()->route('language-tags.index')
            ->with('status', 'Language tag deleted successfully!');
    }
}
