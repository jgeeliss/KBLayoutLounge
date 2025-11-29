@extends('layouts.app')

@section('content')

<h2>{{ $keyboard->name }}</h2>
<p><small>by {{ $keyboard->user->user_alias ?? 'Unknown' }}</small></p>

@php
    $avgRating = $keyboard->averageRating();
    $totalRatings = $keyboard->totalRatings();
    $userRating = auth()->check() ? $keyboard->ratings()->where('user_id', auth()->id())->first() : null;
@endphp

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
<div>
    <h3>Rate this layout</h3>
    @if($userRating)
        <p>Your current rating: {{ $userRating->rating }} stars</p>
    @endif
    <form action="{{ route('keyboards.rate', $keyboard) }}" method="POST">
        @csrf
        <div>
            @for($i = 1; $i <= 5; $i++)
                <label style="cursor: pointer;">
                    <input type="radio" name="rating" value="{{ $i }}" {{ $userRating && $userRating->rating == $i ? 'checked' : '' }} required>
                    <span style="font-size: 1.5rem;">{{ $i }}★</span>
                </label>
            @endfor
            <button type="submit">Submit Rating</button>
        </div>
    </form>
</div>
@endif

@endsection