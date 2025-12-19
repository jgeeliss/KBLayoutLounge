@extends('layouts.app')

@section('content')

<div>
    <h1>{{ $newsitem->title }}</h1>
    <p class="text-gray">Published on {{ $newsitem->created_at->format('F j, Y') }}</p>

    <div>
        <p>{{ $newsitem->body }}</p>
    </div>

    <div>
        <a href="{{ route('newsitems.index') }}">← Back to News</a>
    </div>
</div>

@endsection
