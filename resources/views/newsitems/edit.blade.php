@extends('layouts.app')

@section('content')
<div>
    <h2>Edit News Item</h2>

    <form action="{{ route('newsitems.update', $newsitem) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">
                Title <span>*</span>
            </label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title', $newsitem->title) }}"
                required
                placeholder="Enter news title">
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
                placeholder="Enter news content">{{ old('body', $newsitem->body) }}</textarea>
        </div>

        <div>
            <button type="submit">
                Update News Item
            </button>
            <a href="{{ route('newsitems.show', $newsitem) }}">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
