<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\Newsitem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        // Get keyboards with ratings and calculate average
        $topKeyboards = Keyboard::with('ratings')
            ->get()
            // note:fn() is used to create an arrow function
            ->filter(fn($keyboard) => $keyboard->totalRatings() > 0)
            ->sortByDesc(fn($keyboard) => $keyboard->averageRating())
            ->take(3);

        // Get latest 3 news items
        $latestNews = Newsitem::latest()
            ->take(3)
            ->get();

        return view('home', compact('topKeyboards', 'latestNews'));
    }
}
