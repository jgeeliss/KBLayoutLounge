<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display the authenticated user's ratings.
     */
    public function index()
    {
        if (! auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to view your ratings.');
        }

        $ratings = Rating::where('user_id', auth()->id())
            ->with('keyboard.user')
            ->latest()
            ->get();

        return view('keyboards.my-ratings', compact('ratings'));
    }

    /**
     * Store or update a rating for a keyboard.
     */
    public function store(Request $request, Keyboard $keyboard)
    {
        // Use policy to authorize
        if (! auth()->user()->can('rate', $keyboard)) {
            return back()->withErrors(['rating' => 'You cannot rate your own keyboard layout.']);
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // note: this is a special eloquent method that will either update an existing or create a new one
        Rating::updateOrCreate(
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
