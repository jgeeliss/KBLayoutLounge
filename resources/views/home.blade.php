@extends('layouts.app')

@section('content')
    <h1>
        Welcome to 30 Keys!
    </h1>

    @if($topKeyboards->isNotEmpty())
        <section>
            <h2>Top Rated Layouts</h2>
            @foreach($topKeyboards as $keyboard)
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
        </section>
    @endif

    @if($latestNews->isNotEmpty())
        <section>
            <h2>Latest News</h2>
            @foreach($latestNews as $newsitem)
                <div>
                    <h3>
                        <a href="{{ route('newsitems.show', $newsitem) }}">{{ $newsitem->title }}</a>
                        <span class="text-medium text-light-gray">&nbsp;&nbsp;&nbsp;{{ $newsitem->created_at->diffForHumans() }}</span>
                    </h3>
                    <p class="text-gray">{{ Str::limit($newsitem->body, 150) }}</p>
                </div>
            @endforeach
        </section>
    @endif
@endsection