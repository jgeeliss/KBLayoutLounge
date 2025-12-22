@extends('layouts.app')
<!-- TODO: turn this into a component too -->
@section('content')
<div>
    <h2>Create News Item</h2>

    <form action="{{ route('newsitems.store') }}" method="POST" enctype="multipart/form-data">
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
        </div>

        <div>
            <label for="image">
                Image (optional)
            </label>
            <input
                type="file"
                name="image"
                id="image"
                accept="image/*">
            <small class="text-muted">Max size: 2MB. Accepted formats: JPEG, PNG, JPG, GIF</small>
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
