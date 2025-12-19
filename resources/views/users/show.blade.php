@extends('layouts.app')

@section('content')
    <div>
        <div>
            <h1>{{ $user->user_alias }}'s Profile</h1>

            @if($user->profile_picture)
                <div style="margin: 20px 0;">
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->user_alias }}'s profile picture">
                </div>
            @endif

            <div>
                <p><strong>Email:</strong> {{ $user->email }}</p>

                @if($user->birthday)
                    <p><strong>Birthday:</strong> {{ $user->birthday->format('F j, Y') }}</p>
                @else
                    <p><strong>Birthday:</strong> No idea</p>
                @endif

                @if($user->about_me)
                    <p><strong>About me:</strong></p>
                    <p>{{ $user->about_me }}</p>
                @endif
            </div>
            @if(auth()->check() && auth()->id() === $user->id)
                <a href="{{ route('users.edit') }}" class="button">Edit My Profile</a>
            @endif
        </div>

        <section>
            <h2>Keyboard Layouts ({{ $keyboards->count() }})</h2>

            @forelse($keyboards as $keyboard)
                <div>
                    <h3>
                        <a href="{{ route('keyboards.show', $keyboard) }}">{{ $keyboard->name }}</a>
                        @if($keyboard->ratings_count > 0)
                            <span class="text-medium text-gray">&nbsp;&nbsp;&nbsp;★ {{ number_format($keyboard->averageRating(), 1) }} ({{ $keyboard->totalRatings() }} {{ $keyboard->totalRatings() === 1 ? 'rating' : 'ratings' }})</span>
                        @endif
                        <span class="text-medium text-light-gray">&nbsp;&nbsp;&nbsp;{{ $keyboard->created_at->diffForHumans() }}</span>
                    </h3>

                    @if($keyboard->description)
                        <p>{{ $keyboard->description }}</p>
                    @endif

                    @include('keyboards._layout', ['keyboard' => $keyboard])
                </div>
            @empty
                <p class="text-muted">This user hasn't created any keyboard layouts yet.</p>
            @endforelse
        </section>
    </div>
@endsection
