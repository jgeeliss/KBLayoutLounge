<!-- source: https://laravel.com/docs/12.x/blade#anonymous-components -->
@props([
    'action', // form submission URL, store if creating, update if editing
    'method' => 'POST', // HTTP method for the form, POST for create, PUT for update
    'faqCategory' => null, // FAQ Category model instance, empty for create, populated for edit
    'submitText' => 'Submit', // text for the submit button
    'cancelRoute' // URL for the cancel button
])

<form action="{{ $action }}" method="POST">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="name">
            Name *
        </label>
        <input type="text" name="name" id="name" value="{{ old('name', $faqCategory?->name) }}" required placeholder="Enter category name">
    </div>

    <div>
        <label for="order">
            Order *
        </label>
        <input type="number" name="order" id="order" value="{{ old('order', $faqCategory?->order ?? 0) }}" required placeholder="Display order (0 = first)">
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
