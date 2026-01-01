@extends('layouts.app')

@section('content')

<div>
    <form method="GET" action="{{ route('keyboards.index') }}">
        <label for="language_tag">Filter by language:</label>
        <select name="language_tag" id="language_tag" onchange="this.form.submit()">
            <option value="">All languages</option>
            @foreach($languageTags as $tag)
                <option value="{{ $tag->id }}" {{ $languageTagId == $tag->id ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
    </form>
</div>

@foreach($keyboards as $keyboard)
<div>
    <h3>
        <a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a>
        <span class="text-medium">&nbsp;&nbsp;&nbsp;by
            @if($keyboard->user)
                <a href="{{ route('users.show', $keyboard->user) }}">{{ $keyboard->user->user_alias }}</a>
            @else
                Unknown
            @endif
        </span>
        @if($keyboard->totalRatings() > 0)
            <span class="text-medium text-gray">&nbsp;&nbsp;&nbsp;★ {{ number_format($keyboard->averageRating(), 1) }} ({{ $keyboard->totalRatings() }} {{ $keyboard->totalRatings() === 1 ? 'rating' : 'ratings' }})</span>
        @endif
        <span class="text-medium text-light-gray">&nbsp;&nbsp;&nbsp;{{ $keyboard->created_at->diffForHumans() }}</span>
    </h3>

    @include('keyboards._layout', ['keyboard' => $keyboard])
</div>
@endforeach

@endsection