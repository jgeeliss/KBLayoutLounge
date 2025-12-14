@extends('layouts.app')

@section('content')

<h1>My Ratings</h1>

@if($ratings->isEmpty())
    <p>You haven't rated any keyboard layouts yet. <a href="{{ route('keyboards.index') }}">Browse keyboard layouts</a> to share your ratings!</p>
@else
    @foreach($ratings as $rating)
        <div class="card">
            <div class="card-header">
                <div>
                    <h3 class="card-title">
                        <a href="{{ route('keyboards.show', $rating->keyboard) }}">{{ $rating->keyboard->name }}</a>
                    </h3>
                    <small class="text-muted">by {{ $rating->keyboard->user->user_alias ?? 'Unknown' }}</small>
                </div>
                <small class="text-muted">{{ $rating->updated_at->diffForHumans() }}</small>
            </div>
            <div class="card-content">
                <div class="rating-display">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="star {{ $i <= $rating->rating ? 'star-filled' : 'star-empty' }}">★</span>
                    @endfor
                    <span class="rating-text">{{ $rating->rating }} out of 5</span>
                </div>
            </div>
        </div>
    @endforeach
@endif

@endsection
