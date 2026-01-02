<?php

namespace App\Http\Controllers;

use App\Models\Newsitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsitemController extends Controller
{
    public function index()
    {
        $newsitems = Newsitem::orderBy('created_at', 'desc')->get();

        return view('newsitems.index', compact('newsitems'));
    }

    public function create()
    {
        if (! auth()->user()->can('create', Newsitem::class)) {
            return redirect()->route('newsitems.index')
                ->with('status', 'You do not have permission to create news items.');
        }

        return view('newsitems.create');
    }

    public function store(Request $request)
    {
        if (! auth()->user()->can('create', Newsitem::class)) {
            return redirect()->route('newsitems.index')
                ->with('status', 'You do not have permission to create news items.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // note: uses Laravel's Storage facade to handle file uploads, filename is auto-generated
        // source: https://laravel.com/docs/12.x/filesystem#file-uploads
        if ($request->hasFile('image')) {
            // note: store the image in the 'news_pictures' directory in the 'public' disk
            $validated['image'] = $request->file('image')->store('news_pictures', 'public');
        }

        Newsitem::create($validated);

        return redirect()->route('newsitems.index')
            ->with('status', 'News item created successfully!');
    }

    public function show(Newsitem $newsitem)
    {
        return view('newsitems.show', compact('newsitem'));
    }

    public function edit(Newsitem $newsitem)
    {
        if (! auth()->user()->can('update', $newsitem)) {
            return redirect()->route('newsitems.index')
                ->with('status', 'You do not have permission to edit this news item.');
        }

        return view('newsitems.edit', compact('newsitem'));
    }

    public function update(Request $request, Newsitem $newsitem)
    {
        if (! auth()->user()->can('update', $newsitem)) {
            return redirect()->route('newsitems.index')
                ->with('status', 'You do not have permission to update this news item.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($newsitem->image) {
                Storage::disk('public')->delete($newsitem->image);
            }
            $validated['image'] = $request->file('image')->store('news_pictures', 'public');
        }

        $newsitem->update($validated);

        return redirect()->route('newsitems.show', $newsitem)
            ->with('status', 'News item updated successfully!');
    }

    public function destroy(Newsitem $newsitem)
    {
        if (! auth()->user()->can('delete', $newsitem)) {
            return redirect()->route('newsitems.index')
                ->with('status', 'You do not have permission to delete this news item.');
        }

        // Delete image if exists
        if ($newsitem->image) {
            Storage::disk('public')->delete($newsitem->image);
        }

        $newsitem->delete();

        return redirect()->route('newsitems.index')
            ->with('status', 'News item deleted successfully!');
    }
}
