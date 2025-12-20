<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // TODO: Send email to admin
        // For now, just redirect with success message

        return redirect()->route('contact.show')
            ->with('status', 'Thank you for your message! We will get back to you soon.');
    }
}
