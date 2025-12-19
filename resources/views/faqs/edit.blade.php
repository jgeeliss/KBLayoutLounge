@extends('layouts.app')

@section('content')
<div>
    <h2>Edit FAQ</h2>

    <form action="{{ route('faqs.update', $faq) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="faq_category_id">
                Category <span>*</span>
            </label>
            <select name="faq_category_id" id="faq_category_id" required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('faq_category_id', $faq->faq_category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="question">
                Question <span>*</span>
            </label>
            <input
                type="text"
                name="question"
                id="question"
                value="{{ old('question', $faq->question) }}"
                required
                placeholder="Enter question">
        </div>

        <div>
            <label for="answer">
                Answer <span>*</span>
            </label>
            <textarea
                name="answer"
                id="answer"
                rows="10"
                required
                placeholder="Enter answer">{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <div>
            <button type="submit">
                Update FAQ
            </button>
            <a href="{{ route('faqs.show', $faq) }}">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
