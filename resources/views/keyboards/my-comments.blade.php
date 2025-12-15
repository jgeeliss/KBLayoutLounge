@extends('layouts.app')

@section('content')

<h1>My Comments</h1>

@if($comments->isEmpty())
    <p>You haven't posted any comments yet. <a href="{{ route('keyboards.index') }}">Browse keyboard layouts</a> to share your thoughts!</p>
@else
    @foreach($comments as $comment)
        <div class="card" id="comment-{{ $comment->id }}">
            <div class="card-header">
                <div>
                    <h3 class="card-title">
                        <a href="{{ route('keyboards.show', $comment->keyboard) }}">{{ $comment->keyboard->name }}</a>
                    </h3>
                    <small class="text-muted">by {{ $comment->keyboard->user->user_alias ?? 'Unknown' }}</small>
                </div>
                <div>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    @if($comment->created_at != $comment->updated_at)
                        <small class="text-muted">(edited)</small>
                    @endif
                    <button type="button" class="btn-edit-small" onclick="toggleEditComment({{ $comment->id }})" style="margin-left: 10px;">Edit</button>
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline; margin-left: 5px;" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete-small">Delete</button>
                    </form>
                </div>
            </div>
            <div class="comment-display-{{ $comment->id }}">
                <p class="card-content">{{ $comment->comment }}</p>
            </div>
            <div class="comment-edit-{{ $comment->id }}" style="display: none;">
                <form action="{{ route('comments.update', $comment) }}" method="POST" class="card-content">
                    @csrf
                    @method('PUT')
                    <textarea name="comment" rows="4" class="comment-textarea" required>{{ $comment->comment }}</textarea>
                    <div style="margin-top: 10px;">
                        <button type="submit" class="btn-primary-small">Save</button>
                        <button type="button" class="btn-secondary-small" onclick="toggleEditComment({{ $comment->id }})">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endif

@endsection
