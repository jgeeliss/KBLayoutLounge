@props([
    'action',
    'method' => 'POST',
    'newsitem' => null,
    'submitText' => 'Submit',
    'cancelRoute'
])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="title">
            Title *
        </label>
        <input type="text" name="title" id="title" value="{{ old('title', $newsitem?->title) }}" required placeholder="Enter news title">
    </div>

    <div>
        <label for="body">
            Content *
        </label>
        <textarea name="body" id="body" rows="10" required placeholder="Enter news content">{{ old('body', $newsitem?->body) }}</textarea>
            </div>

    <div>
        <label for="image">
            Image (optional)
        </label>
        @if($newsitem?->image)
            <div>
                <img src="{{ asset('storage/' . $newsitem->image) }}" alt="Current image" style="max-width: 300px;">
            </div>
        @endif
        <input type="file" name="image" id="image" accept="image/*">
        <small class="text-muted">Max size: 2MB. Accepted formats: JPEG, PNG, JPG, GIF</small>
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
