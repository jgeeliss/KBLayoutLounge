<?php

namespace App\Http\Controllers;

use App\Models\Newsitem;
use Illuminate\Http\Request;

class NewsitemController extends Controller
{
    public function index()
    {
        $newsitems = Newsitem::orderBy('created_at', 'desc')->get();
        return view('newsitems.index', compact('newsitems'));
    }

    public function create()
    {
        if (!auth()->user()->can('create', Newsitem::class)) {
            return redirect()->route('newsitems.index')
                ->with('status', 'You do not have permission to create news items.');
        }
        return view('newsitems.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('create', Newsitem::class)) {
            return redirect()->route('newsitems.index')
                ->with('status', 'You do not have permission to create news items.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

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
        if (!auth()->user()->can('update', $newsitem)) {
            return redirect()->route('newsitems.index')
                ->with('status', 'You do not have permission to edit this news item.');
        }
        return view('newsitems.edit', compact('newsitem'));
    }

    public function update(Request $request, Newsitem $newsitem)
    {
        if (!auth()->user()->can('update', $newsitem)) {
            return redirect()->route('newsitems.index')
                ->with('status', 'You do not have permission to update this news item.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $newsitem->update($validated);

        return redirect()->route('newsitems.show', $newsitem)
            ->with('status', 'News item updated successfully!');
    }
}
