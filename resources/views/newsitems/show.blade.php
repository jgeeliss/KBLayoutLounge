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
        @can('update', $newsitem)
            <a href="{{ route('newsitems.edit', $newsitem) }}" class="button">Edit</a>
        @endcan
    </div>
</div>

@endsection
