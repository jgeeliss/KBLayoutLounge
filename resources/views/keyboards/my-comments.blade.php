@extends('layouts.app')

@section('content')

<h1>My Comments</h1>

@if($comments->isEmpty())
    <p>You haven't posted any comments yet. <a href="{{ route('keyboards.index') }}">Browse keyboard layouts</a> to share your thoughts!</p>
@else
    @foreach($comments as $comment)
        <div class="card">
            <div class="card-header">
                <div>
                    <h3 class="card-title">
                        <a href="{{ route('keyboards.show', $comment->keyboard) }}">{{ $comment->keyboard->name }}</a>
                    </h3>
                    <small class="text-muted">by {{ $comment->keyboard->user->user_alias ?? 'Unknown' }}</small>
                </div>
                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
            <p class="card-content">{{ $comment->comment }}</p>
        </div>
    @endforeach
@endif

@endsection
