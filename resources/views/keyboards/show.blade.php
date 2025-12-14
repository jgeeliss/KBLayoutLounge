@extends('layouts.app')

@section('content')

@php
    $avgRating = $keyboard->averageRating();
    $totalRatings = $keyboard->totalRatings();
    $userRating = auth()->check() ? $keyboard->ratings()->where('user_id', auth()->id())->first() : null;
    $isOwner = auth()->check() && $keyboard->user_id === auth()->id();
@endphp

@if(auth()->check() && !$isOwner)
<div class="card">
    <h3>Rate this layout</h3>
    @if($userRating)
        <p class="text-muted text-small">Your current rating: {{ $userRating->rating }} stars</p>
    @endif
    <form action="{{ route('keyboards.rate', $keyboard) }}" method="POST">
        @csrf
        <div class="flex-center">
            @for($i = 1; $i <= 5; $i++)
                <label class="rating-label">
                    <input type="radio" name="rating" value="{{ $i }}" {{ $userRating && $userRating->rating == $i ? 'checked' : '' }} required>
                    <span class="rating-star">{{ $i }}★</span>
                </label>
            @endfor
            <button type="submit">Submit Rating</button>
        </div>
    </form>
</div>
@elseif($isOwner)
<!-- you cannot rate your own layout -->
@else
<p><a href="{{ route('login') }}">Login</a> to rate this layout.</p>
@endif

<h2>{{ $keyboard->name }}</h2>
<p>
    <small>by {{ $keyboard->user->user_alias ?? 'Unknown' }}</small>
    @if($avgRating)
        <small class="text-gray">&nbsp;&nbsp;&nbsp;★ {{ number_format($avgRating, 1) }} ({{ $totalRatings }} {{ $totalRatings == 1 ? 'rating' : 'ratings' }})</small>
    @endif
    <span class="text-medium text-light-gray">&nbsp;&nbsp;&nbsp;{{ $keyboard->created_at->diffForHumans() }}</span>
</p>

@if($isOwner)
<div>
    <a href="{{ route('keyboards.edit', $keyboard) }}">
        <button>Edit Layout</button>
    </a>
    <!-- source: https://laracasts.com/discuss/channels/laravel/laravel-confirm-delete-in-an-alert-in-my-view -->
    <form action="{{ route('keyboards.destroy', $keyboard) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this keyboard layout? This action cannot be undone and will also delete all ratings and comments.');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete">Delete Layout</button>
    </form>
</div>
@endif

@if($keyboard->description)
<p>{{ $keyboard->description }}</p>
@endif
@include('keyboards._layout', ['keyboard' => $keyboard])

@if(auth()->check())
<div class="card">
    <h3>Leave a Comment</h3>
    <form action="{{ route('keyboards.comment', $keyboard) }}" method="POST">
        @csrf
        <div class="flex-column">
            <textarea name="comment" rows="4" placeholder="Share your thoughts about this keyboard layout..." class="comment-textarea"></textarea>
            <button type="submit">Post Comment</button>
        </div>
    </form>
</div>
@else
<p><a href="{{ route('login') }}">Login</a> to leave a comment.</p>
@endif

<div>
    <h3>Comments ({{ $keyboard->comments()->count() }})</h3>

    @forelse($keyboard->comments()->latest()->get() as $comment)
        <div class="card-compact">
            <div class="flex-between">
                <strong>{{ $comment->user->user_alias }}</strong>
                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
            <p>{{ $comment->comment }}</p>
        </div>
    @empty
        <p class="text-muted">No comments yet. Be the first to comment!</p>
    @endforelse
</div>

@endsection