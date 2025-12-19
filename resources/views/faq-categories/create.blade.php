@extends('layouts.app')

@section('content')
<div>
    <h2>Create FAQ Category</h2>

    <form action="{{ route('faq-categories.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">
                Name <span>*</span>
            </label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
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
                value="{{ old('order', 0) }}"
                placeholder="Display order (0 = first)">
        </div>

        <div>
            <button type="submit">
                Create Category
            </button>
            <a href="{{ route('faq-categories.index') }}">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
