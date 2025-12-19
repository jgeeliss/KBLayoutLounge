<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqs')->orderBy('order')->get();
        return view('faqs.index', compact('categories'));
    }

    public function create()
    {
        if (!auth()->user()->can('create', Faq::class)) {
            return redirect()->route('faqs.index')
                ->with('status', 'You do not have permission to create FAQs.');
        }
        $categories = FaqCategory::orderBy('order')->get();
        return view('faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('create', Faq::class)) {
            return redirect()->route('faqs.index')
                ->with('status', 'You do not have permission to create FAQs.');
        }

        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($validated);

        return redirect()->route('faqs.index')
            ->with('status', 'FAQ created successfully!');
    }

    public function show(Faq $faq)
    {
        return view('faqs.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        if (!auth()->user()->can('update', $faq)) {
            return redirect()->route('faqs.index')
                ->with('status', 'You do not have permission to edit this FAQ.');
        }
        $categories = FaqCategory::orderBy('order')->get();
        return view('faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        if (!auth()->user()->can('update', $faq)) {
            return redirect()->route('faqs.index')
                ->with('status', 'You do not have permission to update this FAQ.');
        }

        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($faq->image) {
                \Storage::disk('public')->delete($faq->image);
            }
            $validated['image'] = $request->file('image')->store('faqs', 'public');
        }

        $faq->update($validated);

        return redirect()->route('faqs.show', $faq)
            ->with('status', 'FAQ updated successfully!');
    }

    public function destroy(Faq $faq)
    {
        if (!auth()->user()->can('delete', $faq)) {
            return redirect()->route('faqs.index')
                ->with('status', 'You do not have permission to delete this FAQ.');
        }

        $faq->delete();

        return redirect()->route('faqs.index')
            ->with('status', 'FAQ deleted successfully!');
    }
}
