<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Keyboard;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display the authenticated user's comments.
     */
    public function index()
    {
        if (! auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to view your comments.');
        }

        $comments = Comment::where('user_id', auth()->id())
            ->with('keyboard')
            ->latest()
            ->get();

        // compact() creates an array containing variables and their values
        return view('keyboards.my-comments', compact('comments'));
    }

    /**
     * Store a newly created comment.
     */
    public function store(Request $request, Keyboard $keyboard)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $keyboard->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $validated['comment'],
        ]);

        return back()->with('status', 'Comment posted successfully!');
    }

    /**
     * Update the specified comment.
     */
    public function update(Request $request, Comment $comment)
    {
        // Check if user is authenticated
        if (! auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to edit a comment.');
        }

        // Use policy to authorize
        if (! auth()->user()->can('update', $comment)) {
            return back()->with('status', 'You can only edit your own comments.');
        }

        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $comment->update([
            'comment' => $validated['comment'],
        ]);

        return back()->with('status', 'Comment updated successfully.');
    }

    /**
     * Remove the specified comment.
     */
    public function destroy(Comment $comment)
    {
        // Check if user is authenticated
        if (! auth()->check()) {
            return redirect()->route('login')->with('status', 'You must be logged in to delete a comment.');
        }

        // Use policy to authorize
        if (! auth()->user()->can('delete', $comment)) {
            return back()->with('status', 'You can only delete your own comments.');
        }

        $comment->delete();

        return back()->with('status', 'Comment deleted successfully.');
    }
}
