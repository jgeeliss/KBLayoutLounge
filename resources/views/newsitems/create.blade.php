@extends('layouts.app')

@section('content')
<div>
    <h2>Create News Item</h2>

    <form action="{{ route('newsitems.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">
                Title <span>*</span>
            </label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title') }}"
                required
                placeholder="Enter news title">
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="body">
                Content <span>*</span>
            </label>
            <textarea
                name="body"
                id="body"
                rows="10"
                required
                placeholder="Enter news content">{{ old('body') }}</textarea>
            @error('body')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">
                Create News Item
            </button>
            <a href="{{ route('newsitems.index') }}">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
