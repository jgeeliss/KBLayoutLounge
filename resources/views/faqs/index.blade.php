@extends('layouts.app')

@section('content')

<h1>FAQ</h1>
<div>
    @can('create', App\Models\Faq::class)
        <a href="{{ route('faqs.create') }}" class="button">Add FAQ</a>
    @endcan
    @can('viewAny', App\Models\FaqCategory::class)
        <a href="{{ route('faq-categories.index') }}" class="button">Manage Categories</a>
    @endcan
</div>

@if($categories->isEmpty())
    <p class="text-gray">No FAQs yet.</p>
@else
    @foreach($categories as $category)
        @if($category->faqs->isNotEmpty())
            <div style="margin-bottom: 2rem;">
                <h2>{{ $category->name }}</h2>
                <div>
                    @foreach($category->faqs as $faq)
                        <div style="margin-bottom: 1rem;">
                            <h3>
                                <a href="{{ route('faqs.show', $faq) }}">{{ $faq->question }}</a>
                            </h3>
                            <p class="text-gray">{{ $faq->created_at->format('F j, Y') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endif

@endsection
