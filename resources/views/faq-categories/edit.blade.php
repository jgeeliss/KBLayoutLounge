@extends('layouts.app')

@section('content')
<div>
    <h2>Edit FAQ Category</h2>

    <form action="{{ route('faq-categories.update', $faqCategory) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">
                Name <span>*</span>
            </label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $faqCategory->name) }}"
                required
                placeholder="Enter category name">
        </div>

        <div>
            <label for="order">
                Order
            </label>
            <input
                type="number"
                name="order"
                id="order"
                value="{{ old('order', $faqCategory->order) }}"
                placeholder="Display order (0 = first)">
        </div>

        <div>
            <button type="submit">
                Update Category
            </button>
            <a href="{{ route('faq-categories.index') }}">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
