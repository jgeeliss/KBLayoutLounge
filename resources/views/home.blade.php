@extends('layouts.app')

@section('content')
    <h1>
        Welcome to the Keyboard Layout Lounge Home Page!
    </h1>

    @if($topKeyboards->isNotEmpty())
        <section>
            <h2>Top Rated Layouts</h2>
            @foreach($topKeyboards as $keyboard)
                <div>
                    <h3>
                        <a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a>
                        <span class="text-medium">&nbsp;&nbsp;&nbsp;by {{ $keyboard->user->user_alias ?? 'Unknown' }}</span>
                        @if($keyboard->totalRatings() > 0)
                            <span class="text-medium text-gray">&nbsp;&nbsp;&nbsp;★ {{ number_format($keyboard->averageRating(), 1) }} ({{ $keyboard->totalRatings() }} {{ $keyboard->totalRatings() === 1 ? 'rating' : 'ratings' }})</span>
                        @endif
                        <span class="text-medium text-light-gray">&nbsp;&nbsp;&nbsp;{{ $keyboard->created_at->diffForHumans() }}</span>
                    </h3>
                    @include('keyboards._layout', ['keyboard' => $keyboard])
                </div>
            @endforeach
        </section>
    @endif

    @if($latestKeyboards->isNotEmpty())
        <section>
            <h2>Latest Layouts</h2>
            @foreach($latestKeyboards as $keyboard)
                <div>
                    <h3>
                        <a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a>
                        <span class="text-medium">&nbsp;&nbsp;&nbsp;by {{ $keyboard->user->user_alias ?? 'Unknown' }}</span>
                        @if($keyboard->totalRatings() > 0)
                            <span class="text-medium text-gray">&nbsp;&nbsp;&nbsp;★ {{ number_format($keyboard->averageRating(), 1) }} ({{ $keyboard->totalRatings() }} {{ $keyboard->totalRatings() === 1 ? 'rating' : 'ratings' }})</span>
                        @endif
                        <span class="text-medium text-light-gray">&nbsp;&nbsp;&nbsp;{{ $keyboard->created_at->diffForHumans() }}</span>
                    </h3>
                    @include('keyboards._layout', ['keyboard' => $keyboard])
                </div>
            @endforeach
        </section>
    @endif
@endsection