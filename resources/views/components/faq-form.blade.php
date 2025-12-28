<!-- Anonymous Blade Components -->
<!-- source: https://laravel.com/docs/12.x/blade#anonymous-components -->

@props([
    'action', // form submission URL, store if creating, update if editing
    'method' => 'POST', // HTTP method for the form, POST for create, PUT for update
    'faq' => null, // FAQ model instance, empty for create, populated for edit
    'categories', // list of categories
    'submitText', // text for the submit button
    'cancelRoute' // URL for the cancel button
])

<form action="{{ $action }}" method="POST">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="faq_category_id">
            Category *
        </label>
        <select name="faq_category_id" id="faq_category_id" required>
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('faq_category_id', $faq?->faq_category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="question">
            Question *
        </label>
        <input type="text" name="question" id="question" value="{{ old('question', $faq?->question) }}" required placeholder="Enter question">
    </div>

    <div>
        <label for="answer">
            Answer *
        </label>
        <textarea name="answer" id="answer" rows="10" required placeholder="Enter answer">{{ old('answer', $faq?->answer) }}</textarea>
    </div>

    <div>
        <button type="submit">
            {{ $submitText }}
        </button>
        <a href="{{ $cancelRoute }}">
            Cancel
        </a>
    </div>
</form>
