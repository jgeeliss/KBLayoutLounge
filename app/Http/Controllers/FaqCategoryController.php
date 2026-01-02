<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqs')->orderBy('order')->get();

        return view('faq-categories.index', compact('categories'));
    }

    public function create()
    {
        if (! auth()->user()->can('create', FaqCategory::class)) {
            return redirect()->route('faq-categories.index')
                ->with('status', 'You do not have permission to create categories.');
        }

        return view('faq-categories.create');
    }

    public function store(Request $request)
    {
        if (! auth()->user()->can('create', FaqCategory::class)) {
            return redirect()->route('faq-categories.index')
                ->with('status', 'You do not have permission to create categories.');
        }

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:faq_categories,name',
                'order' => 'required|integer',
            ]);

            FaqCategory::create($validated);

            return redirect()->route('faq-categories.index')
                ->with('status', 'Category created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->with('status', 'A category with this name already exists.');
        }
    }

    public function edit(FaqCategory $faqCategory)
    {
        if (! auth()->user()->can('update', $faqCategory)) {
            return redirect()->route('faq-categories.index')
                ->with('status', 'You do not have permission to edit this category.');
        }

        return view('faq-categories.edit', compact('faqCategory'));
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        if (! auth()->user()->can('update', $faqCategory)) {
            return redirect()->route('faq-categories.index')
                ->with('status', 'You do not have permission to update this category.');
        }

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:faq_categories,name,'.$faqCategory->id,
                'order' => 'required|integer',
            ]);

            $faqCategory->update($validated);

            return redirect()->route('faq-categories.index')
                ->with('status', 'Category updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->with('status', 'A category with this name already exists.');
        }
    }

    public function destroy(FaqCategory $faqCategory)
    {
        if (! auth()->user()->can('delete', $faqCategory)) {
            return redirect()->route('faq-categories.index')
                ->with('status', 'You do not have permission to delete this category.');
        }

        if ($faqCategory->faqs()->count() > 0) {
            return redirect()->route('faq-categories.index')
                ->with('status', 'Cannot delete category with existing FAQs.');
        }

        $faqCategory->delete();

        return redirect()->route('faq-categories.index')
            ->with('status', 'Category deleted successfully!');
    }
}
