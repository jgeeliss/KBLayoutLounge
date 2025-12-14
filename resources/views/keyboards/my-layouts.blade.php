@extends('layouts.app')

@section('content')

<h1>My Keyboard Layouts</h1>

@if($keyboards->isEmpty())
    <p>You haven't created any keyboard layouts yet. <a href="{{ route('keyboards.create') }}">Create your first layout!</a></p>
@else
    @foreach($keyboards as $keyboard)
    <div>
        <h3>
            <a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a>
            @if($keyboard->totalRatings() > 0)
                <span class="text-medium text-gray">&nbsp;&nbsp;&nbsp;★ {{ number_format($keyboard->averageRating(), 1) }} ({{ $keyboard->totalRatings() }} {{ $keyboard->totalRatings() === 1 ? 'rating' : 'ratings' }})</span>
            @endif
            <span class="text-medium text-light-gray">&nbsp;&nbsp;&nbsp;{{ $keyboard->created_at->diffForHumans() }}</span>
        </h3>

        @include('keyboards._layout', ['keyboard' => $keyboard])
    </div>
    @endforeach
@endif

@endsection
