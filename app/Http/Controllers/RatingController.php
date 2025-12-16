<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Store or update a rating for a keyboard.
     */
    public function store(Request $request, Keyboard $keyboard)
    {
        // Prevent users from rating their own layouts
        if ($keyboard->user_id === auth()->id()) {
            return back()->withErrors(['rating' => 'You cannot rate your own keyboard layout.']);
        }

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
