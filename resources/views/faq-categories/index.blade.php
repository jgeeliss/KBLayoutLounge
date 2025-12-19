@extends('layouts.app')

@section('content')

<h1>FAQ Categories</h1>

@if($categories->isEmpty())
    <p class="text-gray">No categories yet.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->order }}</td>
                    <td>
                        @can('update', $category)
                            <a class="button" href="{{ route('faq-categories.edit', $category) }}">Edit</a>
                        @endcan
                        @can('delete', $category)
                            <form action="{{ route('faq-categories.destroy', $category) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<div>
    <div>
        <a href="{{ route('faqs.index') }}">← Back to FAQs</a>
        @can('create', App\Models\FaqCategory::class)
            <a href="{{ route('faq-categories.create') }}" class="button">Add Category</a>
        @endcan
    </div>
</div>

@endsection
