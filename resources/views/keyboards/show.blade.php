@extends('layouts.app')

@section('content')

@php
    $avgRating = $keyboard->averageRating();
    $totalRatings = $keyboard->totalRatings();
    $userRating = auth()->check() ? $keyboard->ratings()->where('user_id', auth()->id())->first() : null;
@endphp

@if(auth()->check())
<div style="margin-top: 20px; padding: 15px; background-color: var(--accent-bg); border-radius: 5px;">
    <h3>Rate this layout</h3>
    @if($userRating)
        <p style="color: var(--text-light); font-size: 0.9rem;">Your current rating: {{ $userRating->rating }} stars</p>
    @endif
    <form action="{{ route('keyboards.rate', $keyboard) }}" method="POST">
        @csrf
        <div style="display: flex; gap: 10px; align-items: center;">
            @for($i = 1; $i <= 5; $i++)
                <label style="cursor: pointer;">
                    <input type="radio" name="rating" value="{{ $i }}" {{ $userRating && $userRating->rating == $i ? 'checked' : '' }} required>
                    <span style="font-size: 1.5rem;">{{ $i }}★</span>
                </label>
            @endfor
            <button type="submit" style="margin-left: 10px;">Submit Rating</button>
        </div>
    </form>
</div>
@else
<p style="margin-top: 20px;"><a href="{{ route('login') }}">Login</a> to rate this layout.</p>
@endif

<h2>{{ $keyboard->name }}</h2>
<p><small>by {{ $keyboard->user->user_alias ?? 'Unknown' }}</small></p>

@if($avgRating)
<div style="margin: 10px 0;">
    <strong>Average Rating:</strong> {{ number_format($avgRating, 1) }} / 5 ({{ $totalRatings }} {{ $totalRatings == 1 ? 'rating' : 'ratings' }})
</div>
@endif

@if($keyboard->description)
<p>{{ $keyboard->description }}</p>
@endif
@include('keyboards._layout', ['keyboard' => $keyboard])

@if(auth()->check())
<div style="margin-top: 20px; padding: 15px; background-color: var(--accent-bg); border-radius: 5px;">
    <h3>Leave a Comment</h3>
    <form action="{{ route('keyboards.comment', $keyboard) }}" method="POST">
        @csrf
        <div style="display: flex; flex-direction: column; gap: 10px;">
            <textarea name="comment" rows="4" placeholder="Share your thoughts about this keyboard layout..." style="width: 100%; padding: 10px; border-radius: 5px;"></textarea>
            <button type="submit">Post Comment</button>
        </div>
    </form>
</div>
@else
<p style="margin-top: 20px;"><a href="{{ route('login') }}">Login</a> to leave a comment.</p>
@endif

<div style="margin-top: 30px;">
    <h3>Comments ({{ $keyboard->comments()->count() }})</h3>

    @forelse($keyboard->comments()->latest()->get() as $comment)
        <div style="margin: 15px 0; padding: 15px; background-color: var(--accent-bg); border-radius: 5px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                <strong>{{ $comment->user->user_alias }}</strong>
                <small style="color: var(--text-light);">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
            <p style="margin: 0;">{{ $comment->comment }}</p>
        </div>
    @empty
        <p style="color: var(--text-light);">No comments yet. Be the first to comment!</p>
    @endforelse
</div>

@endsection