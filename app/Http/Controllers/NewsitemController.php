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
        return view('newsitems.create');
    }

    public function store(Request $request)
    {
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
}
