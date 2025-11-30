@extends('layouts.app')

@section('content')

@foreach($keyboards as $keyboard)
<div>
    <h3>
        <a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a>
        <span style="font-size: medium;">&nbsp;&nbsp;&nbsp;by {{ $keyboard->user->user_alias ?? 'Unknown' }}</span>
        @if($keyboard->totalRatings() > 0)
            <span style="font-size: medium; color: #666;">&nbsp;&nbsp;&nbsp;★ {{ number_format($keyboard->averageRating(), 1) }} ({{ $keyboard->totalRatings() }} {{ $keyboard->totalRatings() === 1 ? 'rating' : 'ratings' }})</span>
        @endif
    </h3>

    @include('keyboards._layout', ['keyboard' => $keyboard])
</div>
@endforeach

@endsection