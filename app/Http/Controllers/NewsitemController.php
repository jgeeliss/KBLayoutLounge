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

    public function show(Newsitem $newsitem)
    {
        return view('newsitems.show', compact('newsitem'));
    }
}
